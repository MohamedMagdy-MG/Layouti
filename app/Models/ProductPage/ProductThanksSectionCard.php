<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductThanksSectionCard extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_thanks_section_cards';

    protected $fillable = ['labelEn','labelAr','textEn','textAr','card'];
}
