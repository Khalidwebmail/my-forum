<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    /**
     * QuestionController constructor.
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
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = auth()->user()->question()->create($request->all());
        return response()->json(new QuestionResource($question), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response()->json(['success'=>'Question updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(['success'=>'Question deleted'], 200);
    }
}
