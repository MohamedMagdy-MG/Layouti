<?php

namespace App\Models\ProductPage\BodyDesignApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignAppLetCheck extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','image','project'];

}
