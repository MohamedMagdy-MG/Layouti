<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIWhatOffer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','titleEn','titleAr','subTitleEn','subTitleAr'];

    public function Points()
    {
        return $this->hasMany(LearnUIWhatOfferPoints::class,'card','id');
    }
}
