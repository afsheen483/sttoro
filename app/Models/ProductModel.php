<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'hashtags',
        'web_image',
        'mobile_image',
        'sale_price',
        'purchase_price',
        'discount_price',
        'shipping_cost',
        'status',
        'is_featured',
        'on_sale',
        'best_selling',
        'is_popular',
        'brand_id',
        'sub_category_id',
        'user_id',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'is_deleted',
    ];
}
