<?php

namespace App\Models\EToy\ContactUsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUsPageSectionTwo extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];

    public function Cards()
    {
        return $this->hasMany(ContactUsPageSectionTwoCards::class,'card','id');
    }
}
