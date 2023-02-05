<?php

namespace App\Models\ProductPage;

use App\Models\Configurations\Deliverable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyDesignAppSectionFour extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','deliverable','color','body','project'];
    
    public function Deliverable()
    {
        return $this->hasOne(Deliverable::class,'id','deliverable');
    }



}
