<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductProjectName extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_project_names';

    protected $fillable = ['labelEn','labelAr','titleEn','titleAr','project'];
}
