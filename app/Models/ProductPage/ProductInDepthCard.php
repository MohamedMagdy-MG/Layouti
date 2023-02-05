<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInDepthCard extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_in_depth_cards';

    protected $fillable = ['image','headLineEn','headLineAr','descriptionEn','descriptionAr','card','category'];
}
