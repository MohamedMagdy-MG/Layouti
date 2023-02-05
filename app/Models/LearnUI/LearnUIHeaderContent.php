<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIHeaderContent extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','titleEn','titleAr','subTitleEn','subTitleAr','descriptionEn','descriptionAr','createByEn',
    'createdByAr','iconOfCreated','createdInEn','createdInAr','iconInCreated','speakerEn','speakerAr','iconOfSpeaker'];
}
