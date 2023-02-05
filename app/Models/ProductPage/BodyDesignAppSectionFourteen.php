<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyDesignAppSectionFourteen extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','body','project'];

    public function Cards()
    {
        return $this->hasMany(BodyDesignAppSectionFourteenCards::class,'card','id');
    }
}
