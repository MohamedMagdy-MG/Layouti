<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnUITestimonials extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];

    public function Cards()
    {
        return $this->hasMany(LearnUITestimonialsCards::class,'card','id');
    }
}
