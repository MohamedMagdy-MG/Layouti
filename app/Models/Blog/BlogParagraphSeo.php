<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogParagraphSeo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['focusKeypharseEn','focusKeypharseAr','seoTitleEn','seoTitleAr'
    ,'slugEn','slugAr','descriptionEn','descriptionAr',
    'facebookImage','facebookTitleEn','facebookTitleAr','facebookDescriptionEn',
    'facebookDescriptionAr','blog'];
}
