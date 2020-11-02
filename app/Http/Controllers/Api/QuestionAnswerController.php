<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Question;
use App\QuestionAnswer;

class QuestionAnswerController extends Controller
{
    use ResponseTrait;
    private $limit;
    public function __construct()
    {
        $this->limit = 5;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('answer')->where('type_id',1)->get();
        return $questions;

        $question_answers = QuestionAnswer::paginate($this->limit);
        return $this->responseWithData($question_answers);
    }


}
