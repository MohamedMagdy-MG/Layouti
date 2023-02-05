<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBodyBrandingImages extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_body_branding_images';

    protected $fillable = ['image','project'];
}
