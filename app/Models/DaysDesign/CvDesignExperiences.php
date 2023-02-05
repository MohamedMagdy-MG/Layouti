<?php

namespace App\Models\DaysDesign;

use App\Models\Configurations\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CvDesignExperiences extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['positionTitleEn','positionTitleAr','positionType',
    'companyNameEn','companyNameAr','companyCountry',
    'workDate','startWorkDate','endWorkDate'];

    public function Cards()
    {
        return $this->hasMany(CvDesignExperiencesRole::class,'card','id');
    }

    public function Country()
    {
        return $this->belongsTo(Countries::class,'companyCountry');
    }
}
