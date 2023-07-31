<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subject_id',
        'name',
        'message',
    ];
    
    public function getPaginateByLimit(int $limit_count){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
}
