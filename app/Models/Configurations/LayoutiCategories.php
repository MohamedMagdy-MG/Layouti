<?php

namespace App\Models\Configurations;

use App\Models\ProductPage\ProductCategory;
use App\Models\ProductPage\ProductGeneralInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayoutiCategories extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['nameEn','nameAr','order'];
    protected $dates = ['deleted_at'];


    public function Products()
    {
        return $this->hasMany(ProductCategory::class,'category','id');
    }
    
}
