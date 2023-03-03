<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post',
        'category_id',
        'image',
        'content',
        'author'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
