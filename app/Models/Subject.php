<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    public function corse_categories(){
        return $this->hasMany(Corse_category::class); 
    }
    
    public function registrations(){
        return $this->hasMany(Refistration::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function review(){
        return $this->hasMany(Review::class);
    }
    
    public function subject_posts(){
        return $this->hasMany(Subject_post::class);
    }
    
}
