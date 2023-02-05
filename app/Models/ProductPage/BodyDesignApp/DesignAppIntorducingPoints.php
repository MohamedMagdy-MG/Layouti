<?php

namespace App\Models\ProductPage\BodyDesignApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignAppIntorducingPoints extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','pointEn','pointAr','point'];

    
}