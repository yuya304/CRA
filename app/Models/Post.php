<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'message',
    ];
    
    public function getPaginateByLimit(int $limit_count){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
