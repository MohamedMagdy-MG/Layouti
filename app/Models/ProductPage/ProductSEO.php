<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSEO extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_s_e_o_s';

    protected $fillable = ['focusKeypharseEn','focusKeypharseAr','seoTitleEn','seoTitleAr'
    ,'slugEn','slugAr','descriptionEn','descriptionAr',
    'facebookImage','facebookTitleEn','facebookTitleAr','facebookDescriptionEn',
    'facebookDescriptionAr','project'];
}
