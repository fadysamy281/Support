<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionType;
//use App\Models\User;

class Complaint extends Model
{
    use HasFactory;
    protected $table = "complaints";
    protected $fillable=['name','phone','email','photo','subscribed','question_type',
    'service_link','question','created_at','user_id'];
    
    public function questionType(){
    	return $this->belongsTo(QuestionType::class,'type_id','id');
    }


}
