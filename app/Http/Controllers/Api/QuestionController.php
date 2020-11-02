<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use ResponseTrait;

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'type_id' => 'required|exists:types,id'
        ]);
        $question = Question::find($id);
        $question->type_id = $request->type_id;
        $question->name = $request->name;
        $question->date = $request->date;
        $question->is_required = $request->is_required;
        $question->optional_description = $request->optional_description;
        $question->save();

        return $this->responseMessage('Question Updated Successfully');
    }


}
