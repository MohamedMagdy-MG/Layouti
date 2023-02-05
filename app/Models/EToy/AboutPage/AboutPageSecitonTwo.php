<?php

namespace App\Models\EToy\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutPageSecitonTwo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleOneEn','titleOneAr','titleTwoEn','titleTwoAr'];
    public function Cards()
    {
        return $this->hasMany(AboutPageSecitonTwoCards::class,'card','id');
    }

}
