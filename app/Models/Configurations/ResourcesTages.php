<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesTages extends Model
{
    use HasFactory,SoftDeletes;
    protected  $fillable = ['color','titleEn','titleAr','order'];
}
