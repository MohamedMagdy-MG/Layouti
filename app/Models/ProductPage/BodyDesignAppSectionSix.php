<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyDesignAppSectionSix extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['labelEn','labelAr','titleEn','titleAr','body','project'];
}
