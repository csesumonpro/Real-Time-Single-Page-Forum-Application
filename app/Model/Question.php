<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Question extends Model
{
    protected static function boot(){
        parent::boot();
        static::creating(function ($question){
            $question->slug = Str::slug($question->title);
        });
        static::updating(function ($question){
            $question->slug = Str::slug($question->title);
        });
    }
    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the slug to id if need
    }

    protected $fillable = ['title','slug','body','category_id','user_id'];

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
