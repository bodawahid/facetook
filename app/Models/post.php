<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes ; 
    use HasFactory;
    protected $dates = ['delete_at'] ; 

    // public function user()
    // {
    //     return $this->belongsto(User::class) ;  
    // }
}
