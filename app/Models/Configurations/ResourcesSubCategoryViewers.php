<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesSubCategoryViewers extends Model
{
    use HasFactory;

    protected $fillable = ['ip','category'];
    
    
}