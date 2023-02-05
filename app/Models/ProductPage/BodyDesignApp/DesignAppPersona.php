<?php

namespace App\Models\ProductPage\BodyDesignApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignAppPersona extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','titleEn','titleAr','descriptionEn','descriptionAr'
    ,'otherTitleEn','otherTitleAr','otherDescriptionEn','otherDescriptionAr','project'];
}
