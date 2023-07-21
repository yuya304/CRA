<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subject_id',
        'user_id',
        'level',
        'understandability',
        'benefit',
    ];
    
    public function user(){
        return $this->belongsTo(User::class); 
    }
    public function subject(){
        return $this->belongsTo(Subject::class); 
    }
}
