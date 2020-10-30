<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Question extends Model
{
    use HasFactory;
    protected $table="questions";
    protected $fillable=['question','answer','category_id','created_at'];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }
}
