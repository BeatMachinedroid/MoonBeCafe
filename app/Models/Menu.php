<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'price',
        'stock',
    ];

    public function cate()
    {
        return $this->belongsTo(Category::class,'category');
    }

    public function order()
    {
        return $this->hasmany(Order::class);
    }
}
