<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Models\Contact_us;
use Carbon\Carbon;
use App\Http\Requests\Contact_usRequest;
class ContactUsController extends Controller
{
    use JSONTrait;
    //Note, creation view returned in ContactPageController
    public function store(Contact_usRequest $request){
    	Contact_us::create([
    		'name'=>$request->name,
    		'phone'=>$request->phone,
    		'email'=>$request->email,
    		'post_code'=>$request->post_code,
    		'message'=>$request->message,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
	   return $this->returnSuccessMessage("message sent successfully");    	
    }
    public function index(){
    	$contacts=Contact_us::paginate(PAGINATION_COUNT);
    	/*return view('contact_us.index')->with($this->
    		returnData($contacts,"category to be editted."));*/
    		return $this->returnData($contacts,"category to be editted.");
    }
    public function showById($id){
    	$contact=Contact_us::find($id);
    	if(!$contact)
    	return $this->returnError("no contact with such id.");
    	/*return view('contact_us.index')->with($this->
    		returnData($contact,"category to be editted.")); */
		$this->returnData($contact,"category to be editted.");
    		   }

    public function destroy($id){
    	$contact=Contact_us::find($id);
    	if(!$contact)
    	return $this->returnError("no contact with such id.");
    	$contact->delete();
    	return $this->index(); }    	
}
