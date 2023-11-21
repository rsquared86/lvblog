<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;

    //fillable fields
    protected $fillable = [
        'comment',
        'user_id',
        'blog_post_id',
    ];
}
