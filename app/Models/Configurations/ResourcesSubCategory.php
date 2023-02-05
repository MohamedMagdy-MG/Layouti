<?php

namespace App\Models\Configurations;

use App\Models\Resources\ResourcesInnerPage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesSubCategory extends Model
{
    // -SoftDeletes
    use HasFactory;
    
    protected  $fillable = ['image','nameEn','nameAr','descriptionEn','descriptionAr','category','order'];
    protected $dates = ['deleted_at'];

    public function Category()
    {
        return $this->belongsTo(ResourcesCategory::class,'category','id');
    }

    public function InnerPage()
    {
        return $this->hasMany(ResourcesInnerPage::class,'subCategory','id');
    }

    public function Viwers()
    {
        return $this->hasMany(ResourcesSubCategoryViewers::class,'id','category');
    }
}
