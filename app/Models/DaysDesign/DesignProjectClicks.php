<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignProjectClicks extends Model
{
    use HasFactory;
    protected $fillable = ['count','project'];
}
