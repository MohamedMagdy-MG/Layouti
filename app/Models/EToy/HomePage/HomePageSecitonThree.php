<?php

namespace App\Models\EToy\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageSecitonThree extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','image'];
}
