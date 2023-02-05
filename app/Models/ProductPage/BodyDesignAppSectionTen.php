<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyDesignAppSectionTen extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','image','body','project'];
}