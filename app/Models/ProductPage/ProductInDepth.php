<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInDepth extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_in_depths';

    protected $fillable = ['titleEn','titleAr','project'];

    public function Cards()
    {
        return $this->hasMany(ProductInDepthCard::class,'card','id');
    }
}
