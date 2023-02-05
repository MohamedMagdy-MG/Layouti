<?php

namespace App\Models\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeedLayoutiForYourProject extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];
    protected $dates = ['deleted_at'];

    public function Cards()
    {
        return $this->hasMany(NeedLayoutiForYourProject_Cards::class,'card','id');
    }
}
