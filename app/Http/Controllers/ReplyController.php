<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Question;
use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * ReplyController constructor.
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Question $question)
    {
        $reply = $question->replies()->create($request->all());
        return response()->json(['reply'=> new ReplyResource($reply)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response()->json(['message'=>'Reply updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return response()->json(['message'=>'Reply deleted'], 200);
    }
}
