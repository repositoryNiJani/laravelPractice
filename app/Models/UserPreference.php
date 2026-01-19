<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $table = 'user_preference';
     protected $fillable = ['username', 'color', 'cake'];
    
    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
