<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ContactPage\ContactFAQsCard;




class LayoutiCategoriesFaqs extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['nameEn','nameAr','quantity','order'];
    protected $dates = ['deleted_at'];

    public function FaqsCards()
    {
        return $this->hasMany(ContactFAQsCard::class,'category','id');
    }


}
