<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductThanksSection extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_thanks_sections';

    protected $fillable = ['titleEn','titleAr','buttonNameEn','buttonNameAr','descriptionEn','descriptionAr','project'];

    public function Cards()
    {
        return $this->hasMany(ProductThanksSectionCard::class,'card','id');
    }
}
