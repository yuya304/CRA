<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongTo(Category::class); 
    }
    
    public function course_categories(){
        return $this->hasMany(Course_category::class); 
    }
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
