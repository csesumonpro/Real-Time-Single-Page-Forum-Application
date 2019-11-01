<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }
   public function likeIt(Reply $reply){
        $reply->likes()->create([
            'user_id'=>auth()->id(),
//            'user_id'=>'1'
        ]);
       broadcast(new LikeEvent($reply->id,1))->toOthers();

   }
   public function unLikeIt(Reply $reply){
        $reply->likes()->whereUserId(auth()->id())->delete();
//        $reply->likes()->whereUserId(1)->delete();
       broadcast(new LikeEvent($reply->id,0))->toOthers();
   }
}
