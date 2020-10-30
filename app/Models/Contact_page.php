<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_page extends Model
{
    use HasFactory;
    protected $table="contact_page";
    protected $fillable=['title','description','main_branch',
    'main_branch_address','branch','branch_address'];
    
}
