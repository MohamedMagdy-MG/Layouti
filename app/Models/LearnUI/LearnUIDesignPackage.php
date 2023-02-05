<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUIDesignPackage extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','titleEn','titleAr','price','hours','descriptionEn','descriptionAr'];

    public function Points()
    {
        return $this->hasMany(LearnUIDesignPackagePoints::class,'card','id');
    }
}
