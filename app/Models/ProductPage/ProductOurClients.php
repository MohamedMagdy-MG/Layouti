<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOurClients extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_our_clients';

    protected $fillable = ['userNameEn','userNameAr','positionEn','positionAr','descriptionEn','descriptionAr','image','project'];
}
