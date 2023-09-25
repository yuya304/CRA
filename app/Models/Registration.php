<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'subject_id',
        'is_definitive',
        'is_reviewed',
    ];
    protected $guarded = [
        'id',    
    ];
    
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function user(){
        return $this->belongsTo(User::class); 
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class); 
    }
    
    public $timestamps = false;
}
