<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'username' => 'Test User',
                'email' => 'yohanesseptian34@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'kasir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'yohanes',
                'email' => 'yohanesseptian23@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'septian',
                'email' => 'yohanesseptian@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'kasir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'minuman',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'makanan',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'fast-food',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'chinese food',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'japanese food',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'traditional food',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $data = 'meja1';
        $qrCode = QrCode::format('svg')->size(400)->generate($data);

        $filename = $data . '.svg';
        Storage::disk('local')->put('public/qrcodes/' . $filename, $qrCode);

        DB::table('tables')->insert([
            [
                'meja' => $data,
                'qrcode' => $filename
            ]
        ]);

        DB::table('menus')->insert([
            [
                'name' => 'jus jeruk',
                'image' => '',
                'category' => 1,
                'price' => 10000,
                'status' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'jus alpukat',
                'image' => '',
                'category' => 1,
                'price' => 10000,
                'status' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'nasi goreng spesial',
                'image' => '',
                'category' => 2,
                'price' => 18000,
                'status' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => '',
                'name' => 'ramen spesial',
                'category' => 5,
                'price' => 20000,
                'status' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'double cheese burger',
                'image' => '',
                'category' => 3,
                'price' => 18000,
                'status' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'sate madura + nasi',
                'image' => '',
                'category' => 6,
                'price' => 25000,
                'status' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


    }
}
