<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswer extends Model
{
	use SoftDeletes;
    protected $fillable = ['question_id','answer'];
}
