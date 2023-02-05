<?php

namespace App\Models\HomePage;

use App\Models\Configurations\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesVisitors extends Model
{
    use HasFactory;
    protected  $fillable = ['count','country','page'];

    public function Country()
    {
        return $this->hasOne(Countries::class,'country','id');
    }


}
