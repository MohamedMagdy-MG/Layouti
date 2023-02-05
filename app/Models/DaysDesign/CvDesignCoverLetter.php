<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CvDesignCoverLetter extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['letterEn','letterAr'];
}
