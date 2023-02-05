<?php

namespace App\Models\EToy\GlobalPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalPageEtoyFaq extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titleEn','titleAr'];

    public function Cards()
    {
        return $this->hasMany(GlobalPageEtoyFaqCards::class,'card','id');
    }
}
