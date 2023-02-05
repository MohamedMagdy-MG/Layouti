<?php

namespace App\Models\EToy\ContactUsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUsPageSectionOne extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];
}
