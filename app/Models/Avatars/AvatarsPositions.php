<?php

namespace App\Models\Avatars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvatarsPositions extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['positionEn','positionAr'];
}
