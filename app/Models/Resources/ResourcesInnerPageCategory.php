<?php

namespace App\Models\Resources;

use App\Models\Configurations\ResourcesCategory;
use App\Models\Configurations\ResourcesSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesInnerPageCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['page','category','subcategory'];

    public function Category()
    {
        return $this->belongsTo(ResourcesCategory::class,'category');
    }
    public function SubCategory()
    {
        return $this->belongsTo(ResourcesSubCategory::class,'subCategory');
    }
}
