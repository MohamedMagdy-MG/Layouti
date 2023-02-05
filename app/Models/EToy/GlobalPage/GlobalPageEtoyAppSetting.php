<?php

namespace App\Models\EToy\GlobalPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalPageEtoyAppSetting extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['favIcon','lightLogo','darkLogo'];
}
