<?php

namespace App\Models\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected  $fillable = ['page','count'];

    public function Cards()
    {
        return $this->hasMany(PagesVisitors::class,'page','id');
    }
}
