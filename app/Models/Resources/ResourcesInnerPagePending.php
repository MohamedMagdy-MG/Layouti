<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesInnerPagePending extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title','link'];
}
