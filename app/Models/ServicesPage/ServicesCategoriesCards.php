<?php

namespace App\Models\ServicesPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Configurations\LayoutiCategoriesServices;

class ServicesCategoriesCards extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['category','projects','descriptionEn','descriptionAr','tagsEn','tagsAr','card'];
    protected $dates = ['deleted_at'];
    
    public function Category()
    {
        return $this->hasOne(LayoutiCategoriesServices::class,'id','category');
    }

}
