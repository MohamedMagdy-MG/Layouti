<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPageHeaderContentCards extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['card','descriptionEn','descriptionAr'];
}
