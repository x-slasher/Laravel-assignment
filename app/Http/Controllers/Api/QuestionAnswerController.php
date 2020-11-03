<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Question;
use App\QuestionAnswer;
use Carbon\Carbon;

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
        $question_answers = QuestionAnswer::paginate($this->limit);
        return $this->responseWithData($question_answers);

    }


}
