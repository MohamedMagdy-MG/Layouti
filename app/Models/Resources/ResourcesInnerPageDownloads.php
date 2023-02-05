<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesInnerPageDownloads extends Model
{
    use HasFactory;

    protected $fillable = ['ip','inner'];
}
