<?php

namespace App\Models\ServicesPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesLearnAboutLayouti extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','downImageDescriptionEn','downImageDescriptionAr','topImage','downImage'];
    protected $dates = ['deleted_at'];
}
