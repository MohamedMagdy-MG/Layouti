<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesInnerPageLikes extends Model
{
    use HasFactory;
    protected $fillable = ['ip','inner'];
}
