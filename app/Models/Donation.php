<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'target',
        'current_balance',
        'donation_text',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
