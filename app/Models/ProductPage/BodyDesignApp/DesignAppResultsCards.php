<?php

namespace App\Models\ProductPage\BodyDesignApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignAppResultsCards extends Model
{
    use HasFactory;
    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','card'];

}
