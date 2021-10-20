<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    use HasFactory;
    protected $table = 'slider';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image',
        'status',
        'is_web',
        'user_id',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'is_deleted',
    ];
}
