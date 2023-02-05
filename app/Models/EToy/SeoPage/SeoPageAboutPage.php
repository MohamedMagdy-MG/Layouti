<?php

namespace App\Models\EToy\SeoPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeoPageAboutPage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['focusKeypharseEn','focusKeypharseAr','seoTitleEn','seoTitleAr'
    ,'slugEn','slugAr','descriptionEn','descriptionAr',
    'facebookImage','facebookTitleEn','facebookTitleAr','facebookDescriptionEn',
    'facebookDescriptionAr'];
}
