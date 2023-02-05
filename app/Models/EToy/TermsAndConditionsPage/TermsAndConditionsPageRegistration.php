<?php

namespace App\Models\EToy\TermsAndConditionsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndConditionsPageRegistration extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr'];

    public function Cards()
    {
        return $this->hasMany(TermsAndConditionsPageRegistrationCards::class,'card','id');
    }
}
