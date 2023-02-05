<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayoutiCategoriesServices extends Model
{
    use HasFactory,SoftDeletes;
    protected  $fillable = ['nameEn','nameAr','order'];
    protected $dates = ['deleted_at'];
}
