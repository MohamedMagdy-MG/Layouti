<?php

namespace App\Models\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutLearnAboutLayouti extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','leftImage','rightImage',
    'otherDescriptionEn','otherDescriptionAr','otherLeftImage','otherRightImage'];
    protected $dates = ['deleted_at'];
}
