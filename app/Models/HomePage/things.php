<?php

namespace App\Models\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class things extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = '100things';
    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr'];
    
    protected $dates = ['deleted_at'];
}
