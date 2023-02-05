<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogAuthor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','nameEn','nameAr','positionEn'
    ,'positionAr','descriptionEn','descriptionAr'];
}
