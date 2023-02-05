<?php

namespace App\Models\EToy\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutPageHeaderContent extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['color','titleEn','titleAr'];
}
