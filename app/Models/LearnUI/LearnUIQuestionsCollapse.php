<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIQuestionsCollapse extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','subTitleEn','subTitleAr'];

    public function Cards()
    {
        return $this->hasMany(LearnUIQuestionsCollapseCards::class,'card','id');
    }
}
