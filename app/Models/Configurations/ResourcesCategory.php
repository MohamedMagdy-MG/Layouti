<?php

namespace App\Models\Configurations;

use App\Models\Resources\ResourcesInnerPage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesCategory extends Model
{
    // -SoftDeletes
    use HasFactory;
    
    protected  $fillable = ['icon','nameEn','nameAr','descriptionEn','descriptionAr','order'];
    protected $dates = ['deleted_at'];

    public function SubCategories()
    {
        return $this->hasMany(ResourcesSubCategory::class,'category','id');
    }

    public function InnerPage()
    {
        return $this->hasMany(ResourcesInnerPage::class,'category','id');
    }
}
