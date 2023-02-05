<?php

namespace App\Models;

use App\Models\Configurations\LayoutiBudget;
use App\Models\Configurations\LayoutiINeed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HireUs extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'fullName','email','need','details','attachment','budget'
    ];

    public function Budget()
    {
        return $this->hasMany(LayoutiBudget::class,'budget','id');
    }
    // public function Need()
    // {
    //     return $this->hasMany(LayoutiINeed::class,'budget','need');
    // }
}
