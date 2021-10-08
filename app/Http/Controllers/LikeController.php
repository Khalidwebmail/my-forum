<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * LikeController constructor.
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    /**
     * @param Reply $reply
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeIt(Reply $reply)
    {
        $reply->like()->create([
            'user_id'   => 1
        ]);
        return response()->json(['success'=>'User give like'], 200);
    }

    /**
     * @param Reply $reply
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function unlikeIt(Reply $reply)
    {
        $reply->like()->where('user_id', '1')->first()->delete();
        return response()->json(['success'=>'User unlike'], 200);
    }
}
