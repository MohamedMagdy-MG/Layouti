<?php

namespace App\Models\EToy\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageSecitonFour extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','qouteEn','qouteAr','nameEn','nameAr','jopTitleEn','jopTitleAr'];
}
