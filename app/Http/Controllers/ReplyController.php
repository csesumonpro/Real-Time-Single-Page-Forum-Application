<?php

namespace App\Http\Controllers;

use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return $question->replies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Question $question,Request $request)
    {

       $reply = $question->replies()->create($request->all());
        return response(['reply'=>$reply],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,Reply $reply)
    {
        return $reply;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $replay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question,Reply $replay)
    {
        $question->replies()->update($request->all());
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
