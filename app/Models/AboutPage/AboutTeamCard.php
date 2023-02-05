<?php

namespace App\Models\AboutPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutTeamCard extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['nameEn','nameAr','jobTitleEn','jobTitleAr','image','card'];
    protected $dates = ['deleted_at'];
}
