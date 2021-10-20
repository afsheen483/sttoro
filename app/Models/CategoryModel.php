<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'web_icon',
        'mobile_icon',
        'status',
        'is_featured',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'is_deleted',
    ];
}
