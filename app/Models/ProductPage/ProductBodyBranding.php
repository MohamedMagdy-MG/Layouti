<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBodyBranding extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_body_brandings';

    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','project'];
}
