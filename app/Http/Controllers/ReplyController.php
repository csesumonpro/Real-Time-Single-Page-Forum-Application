<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use App\Notifications\NewReplyNotification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Question $question,Request $request)
    {
        $request['user_id'] = auth()->user()->id;
       $reply = $question->replies()->create($request->all());
       $user = $question->user;
       if($reply->user_id !== $question->user_id){
           $user->notify(new NewReplyNotification($reply));
       }
        return response(['reply'=>new ReplyResource($reply)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,Reply $reply)
    {
        return new ReplyResource($reply);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $replay
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question,Request $request,Reply $reply){
       $reply->update($request->all());
        return response('Updated',Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $replay
     * @return \Illuminate\Http\Response
     */
public function destroy(Question $question,Reply $reply)
    {
        $reply->delete();
        return  response(null,Response::HTTP_NO_CONTENT);
    }
}
