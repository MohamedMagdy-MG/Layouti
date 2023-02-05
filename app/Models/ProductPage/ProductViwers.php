<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductViwers extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['ip','project'];
}
