<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SayHello extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'fullName','email','phone','message',
    ];

}
