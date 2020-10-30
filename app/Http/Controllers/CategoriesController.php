<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Models\FAQ;
use App\Models\Question;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
	  use JSONTrait;
	  public function index(){
	  	$categories=Category::all();
	  	//paginate(PAGINATION_COUNT);
	  	 
	  	/*return view('categories.index')->with(
	  		$this->returnData($categories,"all categories"));
	  	*/return $this->returnData($categories,"all categories");
	  }
    public function create(){
    	return view('categories.create');
    }
    public function store(CategoriesRequest $request){
    	Category::create(['name'=>$request->name,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("category created successfully.");
    }
    public function destroy($id){
    	$category=Category::find($id);
    	if(!$category)
    	return $this->returnError("category does not exist");
		$category->delete();    		
    	return $this->returnSuccessMessage("category deleted successfully.");
    }    
    public function edit(){
    	return view('categories.edit');
    }
    public function update(CategoriesRequest $request,$id){
    	$category=Category::find($id);
    	if(!$category)
    	return $this->returnError("category does not exist");

    	$category->update(['name'=>$request->name,
    		'updated_at'=>Carbon::now()]);
    	return $this->returnSuccessMessage("category updated successfully.");
    }
}
