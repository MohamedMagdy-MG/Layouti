<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayoutiScope extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'titleEn','titleAr'
    ];

    public function Cards()
    {
        return $this->hasMany(LayoutiScopeCard::class,'card','id');
    }
}
