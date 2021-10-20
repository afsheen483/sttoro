<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'buisness_name',
        'address',
        'buisness_cover_image',
        'phone',
        'user_id',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'is_deleted',
    ];
}
