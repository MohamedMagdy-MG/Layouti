<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIHighlitsDesign extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','subTitleEn','subTitleAr','highlits'];
}
