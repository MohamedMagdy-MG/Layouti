<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CvDesignLanguages extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];
}
