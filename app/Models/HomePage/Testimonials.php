<?php

namespace App\Models\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonials extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];
    protected $dates = ['deleted_at'];
    public function Cards()
    {
        return $this->hasMany(Testimonials_Cards::class,'card','id');
    }
}
