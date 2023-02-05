<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignProjectDownloads extends Model
{
    use HasFactory;
    protected $fillable = ['ip','project'];
}
