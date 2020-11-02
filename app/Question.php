<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['type_id','name','date','is_required','optional_description'];

    public function answer() {
        return $this->hasMany('App\QuestionAnswer');
    }
}
