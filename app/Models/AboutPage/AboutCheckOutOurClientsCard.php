<?php

namespace App\Models\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutCheckOutOurClientsCard extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['descriptionEn','descriptionAr','industryEn','industryAr','image','card'];
    protected $dates = ['deleted_at'];
}
