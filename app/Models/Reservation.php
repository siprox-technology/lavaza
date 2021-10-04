<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'time_slot'
        ,'user_id'
        ,'table_number'
        ,'price'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
