<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        return $this->sendJson($order, 'berhasil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'menu' => 'required|array',
            'menu.*.menu' => 'required',
            'meja' => 'required|int',
            // 'jumlah' => 'required',
            'menu.*.jumlah' => 'required',
            'bank' => 'required|in:bca,bni,bri',
    ]);

    if ($validator->fails()) {
        return $this->sendError('validator gagal', $validator->errors());
    }

    $itemMenu = $request->menu;
    $orders = $request->menu;
    $grossAmount = 0;

    $items = [];

        foreach ($itemMenu as $imenu) {
            $menu = Menu::findOrFail($imenu['menu']);
            if ($menu) {
                $item = [
                    'name' => $menu->name,
                    'category' => $menu->cate->name,
                    'image' => $menu->image,
                    'price' => $menu->price,
                    'status' => $menu->status,
                    'jumlah' => $imenu['jumlah'],
                ];
                $items[] = $item;
            }else {
                return $this->sendNot(null , 'not found menu');
            }
        }

        foreach ($orders as $order) {
            $menu = Menu::findOrFail($order['menu']);
            $grossAmount += $menu->price * $order['jumlah'];
            $jumlah = $order['jumlah'];
        }

    try {
        // return $this->sendJson('berhasil' , $items);
        DB::beginTransaction();
        $serverKey = config('midtrans.server_key');
        $orderId = 'order'.'-'.substr(uniqid(), 5, 13);


        $response = Http::withBasicAuth($serverKey , '')
            ->post('https://api.sandbox.midtrans.com/v2/charge', [
                'payment_type' => 'bank_transfer',
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $grossAmount,
                ],
                'bank_transfer' => [
                    'bank' => $request->bank,
                ],
                'customer_details' => [
                    'email' => $request->email,
                    'first_name' => 'CUSTOMER-',
                    'last_name' => $request->name,
                ],
            ]);

        if ($response->failed()) {
            return $this->ServerEror('failed charge');
        }

        $result = $response->json();
        if ($result['status_code'] != '201') {
            return $this->ServerEror($result['status_message']);
        }

        foreach ($orders as $order) {
            $menu = Menu::findOrFail($imenu['menu']);
            Order::create([
                'order_code' => $orderId,
                'name' => $request->name,
                'email' => $request->email,
                'meja' => $request->meja,
                'menu' => $order['menu'],
                'jumlah' => $order['jumlah'],
                'total_price' => $order['jumlah'] * $menu->price,
                'payment_type' => 'bank_transfer',
                'payment_status' => $result['transaction_status'],
            ]);

            Menu::where('id', $order['menu'])->update([
                'status' => $menu->status - $order['jumlah'],
            ]);
        }

        DB::commit();

        $va = $result['va_numbers'];

        $Json = [
            'status' => 200,
            'message' => 'Success',
            'data' => [
                'transaction_details' => [
                    'order_id' => $result['order_id'],
                    'payment_status' => $result['transaction_status'],
                    'payment_type' => $result['payment_type'],
                    'total' => $result['gross_amount'],
                ],
                'customer_details' => [
                    'email' => $request->email,
                    'name' => $request->name,
                ],
                'item_details' => $items,
                'bank_transfer' => $va
            ]
        ];

        return response()->json($Json);
        // return $this->sendJson($json , 'successfully created va numbers');
        // return response()->json($response->json());
    } catch (\Throwable $th) {
        DB::rollback();
        return $this->sendError($th->getMessage());
        }
    }

    public function statusDetail(Request $request)
    {
        $validator = Validator::validate($request->all() , [
            'order_code' => 'required',
        ]);

        $serverKey = config('midtrans.server_key');

        $response = Http::withBasicAuth($serverKey, '')
            ->get('https://api.sandbox.midtrans.com/v2/'.$request->order_code.'/status');


        if ($response->failed()) {
            return $this->ServerEror('gagal');
        }

        $result = $response->json();

        if($result['transaction_status'] == 'settlement') {
            Order::where('order_code', $result['order_code'])->update([
                'payment_status' => 'sudah dibayar',
            ]);
        }
        return response()->json($response->json());
    }

    public function cancel(Request $request)
    {
        $validator = Validator::validate($request->all() , [
            'order_code' => 'required',
        ]);
            $serverKey = config('midtrans.server_key');

            $response_cek = Http::withBasicAuth($serverKey, '')
                ->get('https://api.sandbox.midtrans.com/v2/'.$request->order_code.'/status');

            $result = $response_cek->json();

            if($result['transaction_status'] == 'pending') {
                    $serverKey = config('midtrans.server_key');

                    $response = Http::withBasicAuth($serverKey, '')
                        ->post('https://api.sandbox.midtrans.com/v2/'.$request->order_code.'/cancel');

                    $results = $response->json();

                    Order::where('order_code', $results['order_id'])->update([
                        'payment_status' => 'cancel',
                    ]);

                    return $this->sendJson($results, 'berhasil');
            }else{
                return $this->sendJson($result , 'transaksi tidak bisa di cancel');
            }
    }
}
