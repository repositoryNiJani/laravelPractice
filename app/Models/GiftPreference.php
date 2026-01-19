<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class giftPreference extends Model
{
     protected $table = 'gift_list';
     protected $fillable = ['username', 'gift'];
    
    // Relationship to User
    public function user()
    {
        // return $this->belongsTo(User::class);
        return $this->hasOne(GiftPreference::class, 'username', 'username');
    }
}
