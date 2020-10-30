<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Models\FAQ;
use App\Models\Question;
use App\Models\Category;
use App\Http\Requests\QuestionsRequest;
class QuestionsController extends Controller
{
	  use JSONTrait;

    public function create(){
    	return view('questions.create');
    }
    public function store(QuestionsRequest $request){
    	Category::create(['question'=>$request->question,
    		'answer'=>$request->answer,
    		'category_id'=>$request->category_id,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("category created successfully.");
    }

    public function edit($id){
    	$question=Question::find($id);
    	if(!$question)
    	return $this->returnError("question does not exist");

    	//return view('questions.edit')->with($this->returnData($question,"question to be editted."));
    	return $this->returnData($question,"question to be editted.");
    }
    public function update(QuestionsRequest $request,$id){
    	$question=Question::find($id);
    	if(!$question)
    	return $this->returnError("question does not exist");

    	$question->update(['question'=>$request->question,
    		'answer'=>$request->answer,
    		'category_id'=>$request->category_id,
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("category updated successfully.");
    }

    public function destroy($id){
    	$question=Question::find($id);
    	if(!$question)
    	return $this->returnError("question does not exist");

    	$question->delete();
    	return $this->returnSuccessMessage("category deleted successfully.");
    }        
}
