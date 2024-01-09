<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;




    public function donation(){
        return $this->belongsTo(Donation::class, 'donation_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
