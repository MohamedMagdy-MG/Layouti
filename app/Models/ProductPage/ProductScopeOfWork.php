<?php

namespace App\Models\ProductPage;

use App\Models\Configurations\LayoutiScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductScopeOfWork extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_scope_of_works';

    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','scope','project'];
    
    public function Scope()
    {
        return $this->hasOne(LayoutiScope::class,'id','scope');
    }
}
