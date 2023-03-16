<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_short_desc',
        'product_long_desc',
        'product_price',
        'product_category_name',
        'product_sub_category_name',
        'category_id',
        'sub_category_id',
        'product_image',
        'product_qty',
        'product_slug',
    ];
}
