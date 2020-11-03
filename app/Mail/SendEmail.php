<?php

namespace App\Mail;

use App\QuestionAnswer;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $questions = QuestionAnswer::whereHas('question',function($query) {
            $query->where('type_id',1);
        })->where(function ($query){
            $query->whereBetween('created_at',array(Carbon::now()->subDay(2),Carbon::now()));
        })->where('answer','!=',NULL);
        $count = $questions->count(); // count all the questions
        $answers= $questions->take(5)->get(); //take 5 answer where question type "textarea"
        return $this->subject('Daily Mail to Admin')->view('mail.email',compact('count','answers'));
    }
}
