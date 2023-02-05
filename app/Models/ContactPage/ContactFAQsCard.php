<?php

namespace App\Models\ContactPage;

use App\Models\Configurations\LayoutiCategoriesFaqs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactFAQsCard extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['questionEn','questionAr','category','answerEn','answerAr','card'];
    protected $dates = ['deleted_at'];

    public function Category()
    {
        return $this->belongsTo(LayoutiCategoriesFaqs::class,'category','id');
    }
    
}
