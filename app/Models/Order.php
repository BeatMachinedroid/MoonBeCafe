<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'name',
        'email',
        'meja',
        'menu',
        'jumlah',
        'total_price',
        'payment_type',
        'payment_status',
    ];

    public function Menu()
    {
        return $this->belongsTo(Menu::class,'menu');
    }

    public function Meja()
    {
        return $this->belongsTo(Table::class,'meja');
    }


}
