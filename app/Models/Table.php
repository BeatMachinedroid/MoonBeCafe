<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'meja',
        'qrcode',
    ];

    public function order()
    {
        return $this->hasmany(Order::class);
    }
}
