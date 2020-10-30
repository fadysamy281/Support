<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Models\Contact_page;
use App\Models\ContactUs;
use App\Http\Requests\Contact_pageRequest;
class ContactPageController extends Controller
{
    use JSONTrait;
    protected $contactPage;	
    public function __construct(){
    	$this->contactPage=Contact_page::first();
    }
  	public function index(){
      /* return view('contact_page.index')->with
       ($this->returnData($this->contactPage,"contact us page description"));
      */ return $this->returnData($this->contactPage,"contact us page description");
    }  	    	
   
	public function destroy(){
		if(!$this->contactPage)
    	return $this->returnError("No info to delete.");
    	$this->contactPage->delete();
		/*return view('contact_page.index')
		->with($this->returnSuccessMessage("info deleted successfully"));*/ 
		return $this->returnSuccessMessage("info deleted successfully");
	}    
}
