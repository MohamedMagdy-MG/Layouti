<?php

namespace App\Models\SEO\Layouti;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayoutiContactUsPage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','keywordsEn',
    'keywordsAr','slugEn','slugAr','image','facebookImage','facebookTitleEn','facebookTitleAr',
    'facebookDescriptionEn','facebookDescriptionAr'];
}

