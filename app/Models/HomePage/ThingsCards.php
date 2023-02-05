<?php

namespace App\Models\HomePage;

use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingsCards extends Model
{
    use HasFactory;
    protected  $fillable = ['card'];
    public function Card()
    {
        return $this->hasOne(ThingsOpportunityAlwaysExists::class,'card','id');
    }
}
