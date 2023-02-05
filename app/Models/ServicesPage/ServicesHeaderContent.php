<?php

namespace App\Models\ServicesPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesHeaderContent extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','image'];
    protected $dates = ['deleted_at'];
}
