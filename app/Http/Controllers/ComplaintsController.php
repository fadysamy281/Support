<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Http\Traits\ImagesTrait;
use App\Models\Complaint;
use Carbon\Carbon;
use App\Http\Requests\ComplaintsRequest;

class ComplaintsController extends Controller
{

    use JSONTrait,ImagesTrait;
  protected $path='/images/complaints/';
  
  public function index(){
  	$complaints=Complaint::paginate(PAGINATION_COUNT);
  	/*return view('complaints.index')->with(
  		$this->returnData($complaints,"all complaints"));
  	*/ return $this->returnData($complaints,"all complaints");
  } 

  public function showById($id){
  	  	$complaint=Complaint::find($id);
  		/*return view('complaints.index')->with(
  		$this->returnData($complaint,"all complaints"));
		*/return $this->returnData($complaint,"all complaints");
  }
  public function create(){
  	return view('complaints.create');
  }   
  public function store(ComplaintsRequest $request){
  	$photo_name=null;
  	$complaint=Complaint::last();
  	if($request->has('photo') )
  	{	if(!$complaint)
  		$photo_name=1;
  		else $photo_name=$complaint->id + 1;
  		$photo_name=$photo_name.'.'.$request->photo->getClientOriginalExtension();
  		$this->saveImage($photo_name,$request->photo,$this->path);
  	}
  	$subscribed=($request->has('subscribed')&&$request->subscribed==1)?1:0;
  	Complaint::create([
  		'name' =>$request->name,
  		'phone'=>$request->phone,
  		'email'=>$request->email,
  		'photo'=>$photo_name,
  		'question_type'=>$request->question_type,
  		'service_link' =>$request->service_link,
  		'subscribed'   =>$subscribed,
  		'question'     =>$request->question,
  		'created_at'   =>Carbon::now(),
  		'updated_at'   =>Carbon::now(),
  		]);
  	return $this->returnSuccessMessage("Complaint sent successfully.");
  }

  public function destroy($id){
  	 $complaint=Complaint::find($id);
  	 if(!$complaint)
    	return $this->returnError("complaint does not exist.");
     $complaint->delete();
  	return $this->returnSuccessMessage("complaint deleted successfully.");

  }

  public function question_type($id){
  	 $complaint=Complaint::find($id);
  	 if(!$complaint)
    	return $this->returnError("complaint does not exist.");  	
    return $this->returnData($complaint->questionType(),"all complaints")
  }
}
