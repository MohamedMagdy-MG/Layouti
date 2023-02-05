<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIQuestionsCollapseCards extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['questionsEn','questionsAr','answerEn','answerAr','card'];
}
