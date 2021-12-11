<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_open',
        'is_setting_manual',
        'open_time',
        'close_time',
    ];
}
