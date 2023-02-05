<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPagePhotoGuidelines extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','subTitleEn','subTitleAr'];

    public function Cards()
    {
        return $this->hasMany(TermsAndConditionsPagePhotoGuidelinesCards::class,'card','id');
    }
}
