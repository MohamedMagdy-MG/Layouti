<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignLinks extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image','titleEn','titleAr','descriptionEn','descriptionAr',
    'topLeftImage','topRightImage','bottomLeftImage','bottomRightImage','linksTitleEn','linksTitleAr'];

    public function Cards()
    {
        return $this->hasMany(DesignLinksCards::class,'card','id');
    }
}
