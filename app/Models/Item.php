<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status',
        'type',
        'detail',
        'updated_at',
    ];

    const TYPES = [
        '1' => '漫画',
        '2' => '小説',
        '3' => 'スポーツ',
        '4' => '料理',
        '5' => '学習',
    ];

    const STOCK = [
        '0' => '無',
        '1' => '有'
    ];
    
}
