<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactPageController;//-
use App\Http\Controllers\ComplaintsController; //-
use App\Http\Controllers\CategoriesController; //-
use App\Http\Controllers\ContactUsController;  //-
use App\Http\Controllers\FAQController;		  //-
use App\Http\Controllers\QuestionsController;  //-
use App\Http\Controllers\QuestionTypesController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
define('PAGINATION_COUNT',5);

    ######################### Begin Categories Routes ########################
Route::prefix('categories')->name('categories.')->group(function(){
	  Route::get('index'     ,[CategoriesController::class, 'index'])->name('index');
	  Route::get('create'    ,[CategoriesController::class, 'create'])->name('create');
	  Route::post('store'    ,[CategoriesController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[CategoriesController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[CategoriesController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[CategoriesController::class, 'destroy'])->name('destroy');

});

    ######################### End Categories Routes ########################

    ######################### Begin Complaints Routes ########################
Route::prefix('complaints')->name('complaints.')->group(function(){
	  Route::get('index'     ,[ComplaintsController::class, 'index'])->name('index');
	  Route::get('create'    ,[ComplaintsController::class, 'create'])->name('create');
	  Route::post('store'    ,[ComplaintsController::class, 'store'])->name('store');
	  Route::get('{id}/show',[ComplaintsController::class, 'showById'])->name('show');
	  Route::post('destroy/{id}'  ,[ComplaintsController::class, 'destroy'])->name('destroy');
	  Route::get('{id}/question_type',[ComplaintsController::class, 'question_type'])->name('question_type');

});

    ######################### End Complaints Routes ########################

    ######################### Begin Contact page Routes ########################
Route::prefix('contact_page')->name('contact_page.')->group(function(){
	  Route::get('index'     ,[ContactPageController::class, 'index'])->name('index');
	  //always will delete 1st record (it just title & description in page)
	  Route::post('destroy'  ,[ContactPageController::class, 'destroy'])->name('destroy');

});

    ######################### End Contact Page Routes ########################

    ######################### Begin contact us  Routes ########################
Route::prefix('contact_us')->name('contact_us.')->group(function(){
	  Route::get('index'     ,[ContactUsController::class, 'index'])->name('index');
	  // create view displayed in route('contact_page.index')
	  Route::post('store'    ,[ContactUsController::class, 'store'])->name('store');
	  Route::get('{id}/show',[ContactUsController::class, 'showById'])->name('show');
	  Route::post('destroy/{id}'  ,[ContactUsController::class, 'destroy'])->name('destroy');

});

    ######################### End contact us Routes ########################

    ######################### Begin FAQ Routes ########################
Route::prefix('FAQ')->name('FAQ.')->group(function(){
	  Route::get('index'     ,[FAQController::class, 'index'])->name('index');
	  Route::get('create'    ,[FAQController::class, 'create'])->name('create');
	  Route::post('store'    ,[FAQController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[FAQController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[FAQController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[FAQController::class, 'destroy'])->name('destroy');
	  Route::get('{id}/show-Category',[FAQController::class, 'showByCategoryId'])->name('category');

});

    ######################### End FAQ Routes ########################

    ######################### Begin Questions Routes ########################
Route::prefix('questions')->name('questions.')->group(function(){
	  // question will be shown (i mean index() ) in FAQController
	  Route::get('create'    ,[QuestionsController::class, 'create'])->name('create');
	  Route::post('store'    ,[QuestionsController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[QuestionsController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[QuestionsController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[QuestionsController::class, 'destroy'])->name('destroy');

});

    ######################### End Questions Routes ########################


    ######################### Begin question types Routes ########################
Route::prefix('question-types')->name('questionTypes.')->group(function(){
	  Route::get('index'     ,[QuestionTypesController::class, 'index'])->name('index');
	  Route::get('create'    ,[QuestionTypesController::class, 'create'])->name('create');
	  Route::post('store'    ,[QuestionTypesController::class, 'store'])->name('store');
	  Route::get('show/{id}',[QuestionTypesController::class, 'showById'])->name('show');
	  Route::post('destroy/{id}'  ,[QuestionTypesController::class, 'destroy'])->name('destroy');

});

    ######################### End question types Routes ########################
