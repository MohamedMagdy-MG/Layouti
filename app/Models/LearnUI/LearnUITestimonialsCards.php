<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUITestimonialsCards extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['nameEn','nameAr','jobTitleEn','jobTitleAr','descriptionEn','descriptionAr',
    'image','card'];
}
