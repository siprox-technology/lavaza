<?php

namespace App\Models;

use App\Models\Order_item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'guest_email',
        'guest_phone',
        'delivery_address',
        'delivery_price',
        'total_price',
        'notes'
    ];

    public function order_items()
    {
        return $this->hasMany(Order_item::class);
    }
}
