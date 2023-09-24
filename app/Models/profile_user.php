<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile_user extends Model
{
    use HasFactory;
    protected $fillable = ['government','bio','gender','user_id']; 
    public function user () 
    {
        return $this->belongsTo(User::class) ; 
    }
}
