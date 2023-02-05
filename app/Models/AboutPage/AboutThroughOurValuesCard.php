<?php

namespace App\Models\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutThroughOurValuesCard extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['nameEn','nameAr','descriptionEn','descriptionAr','image','card'];
    protected $dates = ['deleted_at'];
}
