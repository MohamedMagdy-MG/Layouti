<?php

namespace App\Models\EToy\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageSecitonOne extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];

    public function Cards()
    {
        return $this->hasMany(HomePageSecitonOneCards::class,'card','id');
    }
}

