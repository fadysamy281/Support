<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Models\Question_type;
use App\Http\Requests\QuestionTypesRequest;
class QuestionTypesController extends Controller
{
 	use JSONTrait;  

   public function index(){
  	$questionTypes=Question_type::paginate(PAGINATION_COUNT);
  	/*return view('questionTypes.index')->with(
  		$this->returnData($questionTypes,"all question types"));
    */return $this->returnData($questionTypes,"all question types");
  } 

  public function showById($id){
  	  	$questionType=Question_type::find($id);
  		/*return view('questionTypes.index')->with(
  		$this->returnData($questionType,"all question types"));
		*/return $this->returnData($questionType,"all question types");
  }	
  public function create(){
  	return view('questionTypes.create');
  }

  public function store(QuestionTypesRequest $request){
  	Question_type::create([
  		'name'=>$request->name,
  		'created_at'=>Carbon::now(),
  		'updated_at'=>Carbon::now(),
  	]);
    	return $this->returnSuccessMessage("that Questions type added successfully.");

  }


    public function destroy($id){
    	$questionType=Question_type::find($id);
    	if(!$questionType)
    	return $this->returnError("that type of questions does not exist");
    	//cascade mode (its complaints will be deleted).
		$questionType->delete();    		
    	return $this->returnSuccessMessage("that type of questions  deleted successfully.");
    }

}
