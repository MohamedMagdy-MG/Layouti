<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPageHowToEarnPointsCards extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','subTitleEn','subTitleAr','card'];

    public function Cards()
    {
        return $this->hasMany(TermsAndConditionsPageHowToEarnPointsCardsOfCards::class,'card','id');
    }
}
