<?php

namespace App\Models\LearnUI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendLearnUI extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'fullName','email','phone','package','country'
    ];

}
