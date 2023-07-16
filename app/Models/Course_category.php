<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'subject_id',
        'attribute_id',
    ];
    
    public function getProvisional(){
        return $this::with('subjects', 'courses');
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class); 
    }
    public function course(){
        return $this->belongsTo(Course::class); 
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class); 
    }
}
