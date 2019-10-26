<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the slug to id if need
    }

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function getPathAttribute(){
        return "/question/$this->slug";
//        return asset("api/question/$this->slug"); //fullpath
    }
}
