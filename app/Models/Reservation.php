<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date'
        ,'time'
        ,'user_id'
        ,'table_number'
        ,'price'
        ,'notes'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
