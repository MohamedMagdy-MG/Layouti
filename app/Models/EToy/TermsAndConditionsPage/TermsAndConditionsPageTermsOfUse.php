<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPageTermsOfUse extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr'];

    public function Cards()
    {
        return $this->hasMany(TermsAndConditionsPageTermsOfUseCards::class,'card','id');
    }
}
