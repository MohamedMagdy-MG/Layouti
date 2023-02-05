<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTeamMembers extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_project_team_members';

    protected $fillable = ['labelEn','labelAr','memberNameEn','memberNameAr','project'];
}
