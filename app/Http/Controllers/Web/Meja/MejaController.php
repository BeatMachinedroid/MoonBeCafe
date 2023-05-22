<?php

namespace App\Http\Controllers\Web\Meja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;


class MejaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'meja' => 'required',
        ]);

        $qrCode = QrCode::format('svg')->size(400)->generate($request->meja);

        $filename = $request->meja . '.svg';
        Storage::disk('local')->put('public/qrcodes/' . $filename, $qrCode);

        $meja = new Table;
        $meja->meja = $request->meja;
        $meja->qrcode = $filename;
        $meja->save();

        return back()->with('message', 'Data saved successfully');
    }

    public function download($id)
    {
        $qr = Table::find(decrypt($id));
        $download = Storage::disk('local')->download('public/qrcodes/'.$qr['qrcode']);
        return $download;
    }

    public function delete($id)
    {
        $meja = Table::find(decrypt($id));
        Storage::disk('local')->delete('public/qrcodes/' . $meja['qrcode']);
        $meja->delete();
        return back()->with('message', 'Data deleted successfully');
    }

    public function edit(Request $request)
    {
        $meja = Table::findOrFail($request->id);
        $request->validate([
            'meja' => 'required',
        ]);

        $qrCode = QrCode::format('svg')->size(400)->generate($request->meja);

        $filename = $request->meja . '.svg';
        Storage::disk('local')->put('public/qrcodes/' . $filename, $qrCode);

        $meja->meja = $request->meja;
        $meja->qrcode = $filename;
        $meja->save();

        return back()->with('message', 'Data Edit successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $meja = Table::where('meja', 'LIKE', '%' . $search . '%')->paginate(5);
        }

        return view('layout.table.table' , compact('meja'));
        // return $meja;
    }


}
