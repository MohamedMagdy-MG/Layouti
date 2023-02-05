<?php

namespace App\Models\ThingsPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThingsOpportunityAlwaysExists extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','dateEn','dateAr'];
    protected $dates = ['deleted_at'];
}
