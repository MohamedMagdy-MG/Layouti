<?php

namespace App\Models\ServicesPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesServicesCategories extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['category','projects','descriptionEn','descriptionAr','tagsEn','tagsAr'];
    protected $dates = ['deleted_at'];
}
