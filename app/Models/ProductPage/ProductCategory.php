<?php

namespace App\Models\ProductPage;

use App\Models\Configurations\LayoutiCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['project','category'];

    public function Category()
    {
        return $this->belongsTo(LayoutiCategories::class,'category','id');
    }
    
    public function Project()
    {
        return $this->belongsTo(ProductGeneralInformation::class,'project','id');
    }
}
