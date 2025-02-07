<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'campaign_id', 'amount', 'message','status', 'transaction_id'
    ];



     // Relations

     public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
