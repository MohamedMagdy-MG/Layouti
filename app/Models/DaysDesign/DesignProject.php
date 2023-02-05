<?php

namespace App\Models\DaysDesign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignProject extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['image','coverImage','nameEn','nameAr','ceatedByEn','ceatedByAr'
        ,'availabilityProgramsEn','availabilityProgramsAr','smallDescriptionEn','smallDescriptionAr',
        'date','state','price','link','category','informationEn','informationAr'];

    public function Informations()
    {
        return $this->hasMany(DesignProjectInformations::class,'project','id');
    }

    public function Likes()
    {
        return $this->hasMany(DesignProjectLikes::class,'project','id');
    }

    public function Viwers()
    {
        return $this->hasMany(DesignProjectViewers::class,'project','id');
    }

    public function Downloads()
    {
        return $this->hasMany(DesignProjectDownloads::class,'project','id');
    }

    public function Clicks()
    {
        return $this->hasOne(DesignProjectClicks::class,'project','id');
    }

    public function CoverImages()
    {
        return $this->hasMany(DesignProjectCoverImages::class,'project','id');
    }
    public function Images()
    {
        return $this->hasMany(DesignProjectImages::class,'project','id');
    }

    public function SEO()
    {
        return $this->hasOne(DesignProjectSEO::class,'project','id');
    }

    public function Category()
    {
        return $this->belongsTo(DesignCategory::class,'category','id');
    }
}
