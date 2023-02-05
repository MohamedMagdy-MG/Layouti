<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesInnerPageClicks extends Model
{
    use HasFactory;
    protected $fillable = ['count','inner'];
    

}
