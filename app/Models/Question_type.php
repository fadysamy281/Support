<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;
class Question_type extends Model
{
    use HasFactory;
	protected $table="question_types";
	protected $fillable=['id','name','created_at','updated_at'];

	public function complaints(){
		return $this->hasMany(Complaint::class,'type_id','id');
	}



}
