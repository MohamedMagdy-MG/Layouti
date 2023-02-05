<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignproductsStaticCards extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['logo','slide','titleEn','titleAr','subTitleEn','subTitleAr'
        ,'descriptionEn','descriptionAr','reviewLink','downloadLink','card'];

    public function Cards()
    {
        return $this->hasMany(DesignproductsStaticCardsOfCards::class,'card','id');
    }
}
