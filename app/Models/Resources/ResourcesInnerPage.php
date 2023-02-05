<?php

namespace App\Models\Resources;

use App\Models\Configurations\ResourcesCategory;
use App\Models\Configurations\ResourcesSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesInnerPage extends Model
{
    // -SoftDeletes
    use HasFactory;

    protected  $fillable = ['category','subCategory','image','titleEn','titleAr','descriptionEn','descriptionAr','link','file','color'];
    protected $dates = ['deleted_at'];

    public function Category()
    {
        return $this->belongsTo(ResourcesCategory::class,'category');
    }
    public function SubCategory()
    {
        return $this->belongsTo(ResourcesSubCategory::class,'subCategory');
    }

    
    public function Categories()
    {
        return $this->hasMany(ResourcesInnerPageCategory::class,'id','page');
    }


    public function Clicks()
    {
        return $this->hasOne(ResourcesInnerPageClicks::class,'inner');
    }

    public function Downloads()
    {
        return $this->hasMany(ResourcesInnerPageDownloads::class,'id','inner');
    }
    public function Likes()
    {
        return $this->hasMany(ResourcesInnerPageLikes::class,'inner','id');
    }

    public function Viwers()
    {
        return $this->hasMany(ResourcesInnerPageViewers::class,'inner','id');
    }

}
