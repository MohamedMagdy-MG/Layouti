<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPageHeaderContent extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['color','titleEn','titleAr'];
    public function Cards()
    {
        return $this->hasMany(TermsAndConditionsPageHeaderContentCards::class,'card','id');
    }

}
