<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function replay(){
        return $this->belongsTo(Reply::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
