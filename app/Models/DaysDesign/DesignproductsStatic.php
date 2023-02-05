<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignproductsStatic extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image'];

    public function Cards()
    {
        return $this->hasMany(DesignproductsStaticCards::class,'card','id');
    }
}
