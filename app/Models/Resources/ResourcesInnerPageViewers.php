<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesInnerPageViewers extends Model
{
    use HasFactory;
    protected $fillable = ['ip','inner'];
}
