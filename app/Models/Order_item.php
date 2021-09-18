<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id'
        ,'name'
        ,'name_fa'
        ,'quantity'
        ,'price'  
    ];
}
