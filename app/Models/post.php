<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id', 'data'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    	// return $this->belongsTo(User::class,'user_id','id');
    }

    public function Likes(){
    	return $this->belongsToMany(User::class,'user_post_likes','post_id','user_id')->withTimestamps();
    }
}