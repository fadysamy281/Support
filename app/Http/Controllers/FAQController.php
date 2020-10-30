<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\JSONTrait;
use App\Models\FAQ;
use App\Models\Question;
use App\Models\Category;
use App\Http\Requests\FAQRequest;
class FAQController extends Controller
{
    use JSONTrait;
    protected $FAQData;
    public function __construct(){
    	$this->FAQData=FAQ::first();	

    }
  	public function index(){
  	   $categories=Category::get();
  	   $questions=Question::paginate(PAGINATION_COUNT);
  	   $result=array_merge($this->FAQData,$categories);
  	   $result=array_merge($result,$questions);

      // return view('FAQ.index')->with($this->returnData($result,"all categories"));
       return $this->returnData($result,"all categories");}  	    	
   
    public function showByCategoryId($id){
  	   $category=Category::find($id);

  	   if(!$category)
    	return $this->returnError("category does not exist");

  	   $questions=$category->questions()->paginate(PAGINATION_COUNT);
  	   $result=array_merge($category,$questions);
       return return view('FAQ.showByCategory')->with($this->returnData($result,"all categories"));
       return $this->returnData($result,"all categories");	    	
  }  
    public function create(){
    	return view('FAQ.create');
    }
    public function store(FAQRequest $request){
    	Category::create(['title'=>$request->name,
    		'description'=>$request->description,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("FAQ page's  title and description created successfully.");
    }
    public function edit(){
    	return view('FAQ.edit');
    }
    public function update(FAQRequest $request,$id){
    	$category=Category::find($id);

  	   if(!$category)
    	return $this->returnError("category does not exist");
    	
    	$category->update(['title'=>$request->name,
    		'description'=>$request->description,
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("FAQ page's  title and description updated successfully.");
    }
     public function destroy($id){
    	$category=Category::find($id);

  	   if(!$category)
    	return $this->returnError("category does not exist");
    	
    	$category->delete();
    	return $this->returnSuccessMessage("FAQ page's  title and description deleted successfully.");
    }   
}
