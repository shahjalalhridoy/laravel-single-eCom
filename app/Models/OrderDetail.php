<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'cart_id',
        'pro_id',
        'pro_qty',
        'pro_price',
        'pro_total'
    ];
}
