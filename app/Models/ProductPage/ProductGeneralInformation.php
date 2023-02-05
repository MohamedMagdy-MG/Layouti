<?php

namespace App\Models\ProductPage;

use App\Models\Configurations\LayoutiCategories;
use App\Models\ProductPage\BodyDesignApp\DesignAppChallenges;
use App\Models\ProductPage\BodyDesignApp\DesignAppDeliverables;
use App\Models\ProductPage\BodyDesignApp\DesignAppImage;
use App\Models\ProductPage\BodyDesignApp\DesignAppImagesSection;
use App\Models\ProductPage\BodyDesignApp\DesignAppIntorducing;
use App\Models\ProductPage\BodyDesignApp\DesignAppLetCheck;
use App\Models\ProductPage\BodyDesignApp\DesignAppMobileApps;
use App\Models\ProductPage\BodyDesignApp\DesignAppMobileExportScreen;
use App\Models\ProductPage\BodyDesignApp\DesignAppPersona;
use App\Models\ProductPage\BodyDesignApp\DesignAppProjectInfo;
use App\Models\ProductPage\BodyDesignApp\DesignAppResults;
use App\Models\ProductPage\BodyDesignApp\DesignAppSections;
use App\Models\ProductPage\BodyDesignApp\DesignAppSectionsTwo;
use App\Models\ProductPage\BodyDesignApp\DesignAppTaskDescription;
use App\Models\ProductPage\BodyDesignApp\DesignAppWhatIsTheProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGeneralInformation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_general_information';

    protected $fillable = ['template','image','thumbnailImage','color','launch','order','status'];

    public function Category()
    {
        return $this->hasMany(ProductCategory::class,'project','id');
    }
    public function ProjectInformation()
    {
        return $this->hasOne(ProjectInformation::class,'project','id');
    }
    public function ProjectName()
    {
        return $this->hasMany(ProductProjectName::class,'project','id');
    }

    

    public function Viewers()
    {
        return $this->hasMany(ProductViwers::class,'project','id');
    }

    public function TeamMembers()
    {
        return $this->hasMany(ProductTeamMembers::class,'project','id');
    }

    public function InDepth()
    {
        return $this->hasOne(ProductInDepth::class,'project','id');
    }

    public function ScopeOfWork()
    {
        return $this->hasOne(ProductScopeOfWork::class,'project','id');
    }

    public function BodyBranding()
    {
        return $this->hasMany(ProductBodyBranding::class,'project','id');
    }

    public function BodyBrandingImages()
    {
        return $this->hasMany(ProductBodyBrandingImages::class,'project','id');
    }

    public function DesignAppIntorducing()
    {
        return $this->hasOne(DesignAppIntorducing::class,'project','id');
    }

    public function DesignAppTaskDescription()
    {
        return $this->hasOne(DesignAppTaskDescription::class,'project','id');
    }

    public function DesignAppDeliverables()
    {
        return $this->hasOne(DesignAppDeliverables::class,'project','id');
    }

    public function DesignAppImage()
    {
        return $this->hasOne(DesignAppImage::class,'project','id');
    }

    public function DesignAppProjectInfo()
    {
        return $this->hasMany(DesignAppProjectInfo::class,'project','id');
    }

    public function DesignAppWhatIsTheProject()
    {
        return $this->hasOne(DesignAppWhatIsTheProject::class,'project','id');
    }

    public function DesignAppChallenges()
    {
        return $this->hasOne(DesignAppChallenges::class,'project','id');
    }

    public function DesignAppLetCheck()
    {
        return $this->hasOne(DesignAppLetCheck::class,'project','id');
    }

    public function DesignAppSections()
    {
        return $this->hasMany(DesignAppSections::class,'project','id');
    }

    public function DesignAppPersona()
    {
        return $this->hasMany(DesignAppPersona::class,'project','id');
    }

    public function DesignAppSectionsTwo()
    {
        return $this->hasMany(DesignAppSectionsTwo::class,'project','id');
    }

    public function DesignAppMobileApps()
    {
        return $this->hasOne(DesignAppMobileApps::class,'project','id');
    }

    public function DesignAppMobileExportScreen()
    {
        return $this->hasOne(DesignAppMobileExportScreen::class,'project','id');
    }

    public function DesignAppImagesSection()
    {
        return $this->hasOne(DesignAppImagesSection::class,'project','id');
    }

    public function DesignAppResults()
    {
        return $this->hasOne(DesignAppResults::class,'project','id');
    }



    






    public function OurClients()
    {
        return $this->hasOne(ProductOurClients::class,'project','id');
    }

    public function ThanksSection()
    {
        return $this->hasOne(ProductThanksSection::class,'project','id');
    }

    public function SEO()
    {
        return $this->hasOne(ProductSEO::class,'project','id');
    }

}
