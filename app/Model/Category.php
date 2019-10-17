<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the slug to id if need
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
