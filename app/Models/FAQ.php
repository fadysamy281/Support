<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{//Page Content
    use HasFactory;
    //this format happen when creating migration.
    protected $table = "f_a_q_s";
    protected $fillable=['title','description','created_at'];


}
