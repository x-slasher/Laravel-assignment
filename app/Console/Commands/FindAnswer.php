<?php

namespace App\Console\Commands;

use App\QuestionAnswer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FindAnswer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:answer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find all empty answer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
	    $question_answers = QuestionAnswer::where('answer',NULL)->where('created_at','>=',Carbon::now()->subDay(1))->get();
	    foreach ($question_answers as $answer) {
		    $answer->delete();
	    }
	    Log::info('--Answer Deleted Successfully--');
    }
}
