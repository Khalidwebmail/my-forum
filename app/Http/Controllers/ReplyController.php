<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reply::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reply::create($request->all());
        return response()->json(['message'=>'Reply created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        return $reply;
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
