<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayoutiBudget extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'budgetEn','budgetAr','order'
    ];
}
