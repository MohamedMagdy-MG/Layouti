<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIStepsReachCardsOfCards extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['icon','titleEn','titleAr','descriptionEn','descriptionAr','card'];
}
