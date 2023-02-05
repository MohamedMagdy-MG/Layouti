<?php

namespace App\Models\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutThroughOurValues extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];
    protected $dates = ['deleted_at'];

    public function Cards()
    {
        return $this->hasMany(AboutThroughOurValuesCard::class,'card','id');
    }
}
