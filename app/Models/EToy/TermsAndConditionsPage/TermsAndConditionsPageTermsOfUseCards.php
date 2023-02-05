<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPageTermsOfUseCards extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','card'];

    public function Cards()
    {
        return $this->hasMany(TermsAndConditionsPageTermsOfUseCardsOfCard::class,'card','id');
    }
}
