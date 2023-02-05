<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ProductPage\ProductGeneralInformationResource;
use App\Http\Traits\Response;
use App\Http\Traits\Pagination;
use App\Models\Configurations\LayoutiCategories;
use App\Models\Configurations\LayoutiScope;
use App\Models\ProductPage\BodyDesignApp\DesignAppChallenges;
use App\Models\ProductPage\BodyDesignApp\DesignAppChallengesCards;
use App\Models\ProductPage\BodyDesignApp\DesignAppDeliverables;
use App\Models\ProductPage\BodyDesignApp\DesignAppImage;
use App\Models\ProductPage\BodyDesignApp\DesignAppImagesSection;
use App\Models\ProductPage\BodyDesignApp\DesignAppIntorducing;
use App\Models\ProductPage\BodyDesignApp\DesignAppIntorducingPoints;
use App\Models\ProductPage\BodyDesignApp\DesignAppLetCheck;
use App\Models\ProductPage\BodyDesignApp\DesignAppMobileApps;
use App\Models\ProductPage\BodyDesignApp\DesignAppMobileAppsCards;
use App\Models\ProductPage\BodyDesignApp\DesignAppMobileExportScreen;
use App\Models\ProductPage\BodyDesignApp\DesignAppPersona;
use App\Models\ProductPage\BodyDesignApp\DesignAppProjectInfo;
use App\Models\ProductPage\BodyDesignApp\DesignAppResults;
use App\Models\ProductPage\BodyDesignApp\DesignAppResultsCards;
use App\Models\ProductPage\BodyDesignApp\DesignAppSections;
use App\Models\ProductPage\BodyDesignApp\DesignAppSectionsTwo;
use App\Models\ProductPage\BodyDesignApp\DesignAppTaskDescription;
use App\Models\ProductPage\BodyDesignApp\DesignAppWhatIsTheProject;

use App\Models\ProductPage\ProductBodyBranding;
use App\Models\ProductPage\ProductBodyBrandingImages;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductInDepth;
use App\Models\ProductPage\ProductInDepthCard;
use App\Models\ProductPage\ProductOurClients;
use App\Models\ProductPage\ProductProjectName;
use App\Models\ProductPage\ProductScopeOfWork;
use App\Models\ProductPage\ProductSEO;
use App\Models\ProductPage\ProductTeamMembers;
use App\Models\ProductPage\ProductThanksSection;
use App\Models\ProductPage\ProductThanksSectionCard;
use App\Models\ProductPage\ProjectInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use Response,Pagination;
    public $productProjectName;
    public $productTeamMember;
    public $productInDepth;
    public $productInDepthCard;
    public $productScopeOfWork;
    public $layoutiScope;
    public $productOurClients;
    public $productThanksSection;
    public $productThanksSectionCard;
    public $productSEO;

    public $productBodyBranding;
    public $productBodyBrandingImages;

    public $productGeneralInformation;
    public $layoutiCategories;


    public $projectInformation;

    public $designAppIntorducing; 
    public $designAppIntorducingPoints; 
    public $designAppTaskDescription; 
    public $designAppDeliverables; 
    public $designAppImage;
    public $designAppProjectInfo;
    public $designAppWhatIsTheProject; 
    public $designAppChallenges; 
    public $designAppChallengesCards; 
    public $designAppLetCheck;
    public $designAppSections; 
    public $designAppPersona;
    public $designAppSectionsTwo;
    public $designAppMobileApps;
    public $designAppMobileAppsCards ;
    public $designAppMobileExportScreen; 
    public $designAppImagesSection; 
    public $designAppResults;
    public $designAppResultsCards;


    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->layoutiCategories = new LayoutiCategories();
        $this->productProjectName = new ProductProjectName();
        $this->projectInformation = new ProjectInformation();
        $this->productTeamMember = new ProductTeamMembers();
        $this->productInDepth = new ProductInDepth();
        $this->productInDepthCard = new ProductInDepthCard();
        $this->productOurClients = new ProductOurClients();
        $this->productScopeOfWork = new ProductScopeOfWork();
        $this->layoutiScope = new LayoutiScope();
        $this->productThanksSection = new ProductThanksSection();
        $this->productThanksSectionCard = new ProductThanksSectionCard();
        $this->productSEO = new ProductSEO();
        $this->productBodyBranding = new ProductBodyBranding();
        $this->productBodyBrandingImages = new ProductBodyBrandingImages();


        $this->designAppIntorducing = new DesignAppIntorducing();
        $this->designAppIntorducingPoints = new DesignAppIntorducingPoints();
        $this->designAppTaskDescription = new DesignAppTaskDescription();
        $this->designAppDeliverables = new DesignAppDeliverables();
        $this->designAppImage = new DesignAppImage();
        $this->designAppProjectInfo = new DesignAppProjectInfo();
        $this->designAppWhatIsTheProject = new DesignAppWhatIsTheProject();
        $this->designAppChallenges = new DesignAppChallenges();
        $this->designAppChallengesCards = new DesignAppChallengesCards();
        $this->designAppLetCheck = new DesignAppLetCheck();
        $this->designAppSections = new DesignAppSections();
        $this->designAppPersona = new DesignAppPersona();
        $this->designAppSectionsTwo = new DesignAppSectionsTwo();
        $this->designAppMobileApps = new DesignAppMobileApps();
        $this->designAppMobileAppsCards = new DesignAppMobileAppsCards();
        $this->designAppMobileExportScreen = new DesignAppMobileExportScreen();
        $this->designAppImagesSection = new DesignAppImagesSection();
        $this->designAppResults = new DesignAppResults();
        $this->designAppResultsCards = new DesignAppResultsCards();

        $this->middleware('checkAuth');
    }
    
    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Layouti Projects Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $productGeneralInformation = $this->productGeneralInformation->find($id);
                    if ($productGeneralInformation != null ) {
                        $productGeneralInformation->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Layouti Projects Arrange Success',true, 200);
        }


    }


    public function index()
    {
        $search = null;
       
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }


        if ($search != null) {
            $query = $this->productGeneralInformation
                ->orWhere('category', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->productGeneralInformation;

        }

        $productGeneralInformation = $query->orderBy('order','ASC')->get();

        
        return $this->ResponseData(ProductGeneralInformationResource::collection($productGeneralInformation), 'Get All Products General Information Operation Success',true, 200);
    }

    public function find(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->id);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Product Not Found',false,400);
        }
        return $this->ResponseData(new ProductGeneralInformationResource($productGeneralInformation), 'Find Product General Information Operation Success',true, 200);
    }

    public function addProjectInformation($nameEn,$nameAr,$slogenEn,$slogenAr,$descriptionEn,$descriptionAr,$project)
    {

        $projectInformation = $this->projectInformation->where('project',$project)->first();
        if($projectInformation != null){
            $projectInformation->update([
                'nameEn' => $nameEn,
                'nameAr' => $nameAr,
                'slogenEn' => $slogenEn,
                'slogenAr' => $slogenAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $projectInformation = $this->projectInformation->create([
                'nameEn' => $nameEn,
                'nameAr' => $nameAr,
                'slogenEn' => $slogenEn,
                'slogenAr' => $slogenAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }


    }

    public function addProductProjectName($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productProjectName = $this->productProjectName->where('project',$project)->skip($key)->first();
                if($productProjectName != null){
                    $productProjectName->update([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'project' => $project
                    ]);
                }
                else{
                    $this->productProjectName->create([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function addProductTeamMember($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productTeamMember = $this->productTeamMember->where('project',$project)->skip($key)->first();
                if($productTeamMember != null){
                    $productTeamMember->update([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'memberNameEn' => $card['memberNameEn'],
                        'memberNameAr' => $card['memberNameAr'],
                        'project' => $project
                    ]);
                }
                else{
                    $this->productTeamMember->create([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'memberNameEn' => $card['memberNameEn'],
                        'memberNameAr' => $card['memberNameAr'],
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function addProductInDepth($titleEn,$titleAr,$cards,$cardsCount,$project)
    {

        $productInDepth = $this->productInDepth->where('project',$project)->first();
        if($productInDepth != null){
            $productInDepth->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'project' => $project
            ]);
        }else{
            $productInDepth = $this->productInDepth->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'project' => $project
            ]);
        }

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productInDepthCard = $this->productInDepthCard->where('card',$productInDepth->id)->skip($key)->first();
                if($productInDepthCard != null){
                    $imageName = $productInDepthCard->image;
                    if(is_file($card['image'])){
                        if($productInDepthCard->image != null){
                            unlink($productInDepthCard->image);
                        }
                        $imageName = 'media/ProductPage/InDepth/'.time().'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/InDepth',$imageName);
                    }
                    $productInDepthCard->update([
                        'image' => $imageName,
                        'headLineEn' => $card['headLineEn'],
                        'headLineAr' => $card['headLineAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'category' => $card['category'],
                        'card' => $productInDepth->id
                    ]);
                }
                else{
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/ProductPage/InDepth/'.time().'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/InDepth',$imageName);
                    }
                    $this->productInDepthCard->create([
                        'image' => $imageName,
                        'headLineEn' => $card['headLineEn'],
                        'headLineAr' => $card['headLineAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'category' => $card['category'],
                        'card' => $productInDepth->id
                    ]);
                }

            }
        }
    }

    public function addProductScopeOfWork($titleEn,$titleAr,$descriptionEn,$descriptionAr,$category,$project)
    {
        $layoutiScope = NULL;
         if($this->layoutiScope->find($category) != NULL){
            $layoutiScope = $this->layoutiScope->find($category)->id;
        }

        $productScopeOfWork = $this->productScopeOfWork->where('project',$project)->first();
        if($productScopeOfWork != null){
            $productScopeOfWork->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'scope' => $layoutiScope,
                'project' => $project
            ]);
        }else{
            $this->productScopeOfWork->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'scope' => $layoutiScope,
                'project' => $project
            ]);
        }

    }

    public function addProductOurClients($userNameEn,$userNameAr,$positionEn,$positionAr,$descriptionEn,$descriptionAr,$image,$project)
    {

        $productOurClients = $this->productOurClients->where('project',$project)->first();
        if($productOurClients != null){
            $imageName = $productOurClients->image;
            if(is_file($image)){
                if($productOurClients->image != null){
                    unlink($productOurClients->image);
                }
                $imageName = 'media/ProductPage/OurClients/'.time().'-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/OurClients',$imageName);
            }
            $productOurClients->update([
                'userNameEn' => $userNameEn,
                'userNameAr' => $userNameAr,
                'positionEn' => $positionEn,
                'positionAr' => $positionAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($image)){
                $imageName = 'media/ProductPage/OurClients/'.time().'-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/OurClients',$imageName);
            }
            $this->productOurClients->create([
                'userNameEn' => $userNameEn,
                'userNameAr' => $userNameAr,
                'positionEn' => $positionEn,
                'positionAr' => $positionAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }

    }


    public function addProductThanksSection($titleEn,$titleAr,$buttonNameEn,$buttonNameAr,$descriptionEn,$descriptionAr,$cards,$cardsCount,$project)
    {

        $productThanksSection = $this->productThanksSection->where('project',$project)->first();
        if($productThanksSection != null){
            $productThanksSection->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'buttonNameEn' => $buttonNameEn,
                'buttonNameAr' => $buttonNameAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $productThanksSection = $this->productThanksSection->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'buttonNameEn' => $buttonNameEn,
                'buttonNameAr' => $buttonNameAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productThanksSectionCard = $this->productThanksSectionCard->where('card',$productThanksSection->id)->skip($key)->first();
                if($productThanksSectionCard != null){
                    $productThanksSectionCard->update([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'textEn' => $card['textEn'],
                        'textAr' => $card['textAr'],
                        'card' => $productThanksSection->id
                    ]);
                }
                else{

                    $this->productThanksSectionCard->create([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'textEn' => $card['textEn'],
                        'textAr' => $card['textAr'],
                        'card' => $productThanksSection->id
                    ]);
                }

            }
        }
    }

    public function addProductSEO($focusKeypharseEn,$focusKeypharseAr,$seoTitleEn,$seoTitleAr,$slugEn,$slugAr,$descriptionEn,
    $descriptionAr,$facebookTitleEn,$facebookTitleAr,$facebookDescriptionEn,$facebookDescriptionAr,
    $facebookImage,$project)
    {


        $productSEO = $this->productSEO->where('project',$project)->first();
        if($productSEO != null){
            $imageName = $productSEO->facebookImage;
            if(is_file($facebookImage)){
                if($productSEO->facebookImage != null){
                    unlink($productSEO->facebookImage);
                }
                $imageName = 'media/ProductPage/SEO/'.time().'-facebookImage-'.$facebookImage->getClientOriginalName();
                $facebookImage->move('media/ProductPage/SEO',$imageName);
            }
            $productSEO->update([
                'focusKeypharseEn' => $focusKeypharseEn,
                'focusKeypharseAr' => $focusKeypharseAr,
                'seoTitleEn' => $seoTitleEn,
                'seoTitleAr' => $seoTitleAr,
                'slugEn' => $slugEn,
                'slugAr' => $slugAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'facebookTitleEn' => $facebookTitleEn,
                'facebookTitleAr' => $facebookTitleAr,
                'facebookDescriptionEn' => $facebookDescriptionEn,
                'facebookDescriptionAr' => $facebookDescriptionAr,
                'facebookImage' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($facebookImage)){
                $imageName = 'media/ProductPage/SEO/'.time().'-facebookImage-'.$facebookImage->getClientOriginalName();
                $facebookImage->move('media/ProductPage/SEO',$imageName);
            }
            $this->productSEO->create([
                'focusKeypharseEn' => $focusKeypharseEn,
                'focusKeypharseAr' => $focusKeypharseAr,
                'seoTitleEn' => $seoTitleEn,
                'seoTitleAr' => $seoTitleAr,
                'slugEn' => $slugEn,
                'slugAr' => $slugAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'facebookTitleEn' => $facebookTitleEn,
                'facebookTitleAr' => $facebookTitleAr,
                'facebookDescriptionEn' => $facebookDescriptionEn,
                'facebookDescriptionAr' => $facebookDescriptionAr,
                'facebookImage' => $imageName,
                'project' => $project
            ]);
        }

    }
    

    public function addProductBodyBranding($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productBodyBranding = $this->productBodyBranding->where('project',$project)->skip($key)->first();
                if($productBodyBranding != null){
                    $productBodyBranding->update([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'project' => $project
                    ]);
                }
                else{
                    $this->productBodyBranding->create([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function addProductBodyBrandingImages($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productBodyBrandingImages = $this->productBodyBrandingImages->where('project',$project)->skip($key)->first();
                if($productBodyBrandingImages != null){

                    $imageName = $productBodyBrandingImages->image;
                    if(is_file($card['image'])){
                        if($productBodyBrandingImages->image != null){
                            unlink($productBodyBrandingImages->image);
                        }
                        $imageName = 'media/ProductPage/BodyBrandingImagesCards/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/BodyBrandingImagesCards',$imageName);
                    }
                    $productBodyBrandingImages->update([
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }
                else{

                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/ProductPage/BodyBrandingImagesCards/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/BodyBrandingImagesCards',$imageName);
                    }
                    $this->productBodyBrandingImages->create([
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function DesignAppIntorducing($titleEn,$titleAr,$subTitleEn,$subTitleAr,$project,$cards,$cardsCount)
    {
        $designAppIntorducing = $this->designAppIntorducing->where('project',$project)->first();
        if($designAppIntorducing != null){
            $designAppIntorducing->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'subTitleEn' => $subTitleEn,
                'subTitleAr' => $subTitleAr,
                'project' => $project
            ]);
        }else{
            $designAppIntorducing = $this->designAppIntorducing->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'subTitleEn' => $subTitleEn,
                'subTitleAr' => $subTitleAr,
                'project' => $project
            ]);
        }
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppIntorducingPoints = $this->designAppIntorducingPoints->where('point',$designAppIntorducing->id)->skip($key)->first();
                if($designAppIntorducingPoints != null){

                    $designAppIntorducingPoints->update([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'pointEn' => $card['pointEn'],
                        'pointAr' => $card['pointAr'],
                        'point' => $designAppIntorducing->id
                    ]);
                }
                else{
                    $this->designAppIntorducingPoints->create([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'pointEn' => $card['pointEn'],
                        'pointAr' => $card['pointAr'],
                        'point' => $designAppIntorducing->id
                    ]);
                }

            }
        }
    }
    public function DesignAppTaskDescription($titleEn,$titleAr,$descriptionEn,$descriptionAr,$project)
    {
        $designAppTaskDescription = $this->designAppTaskDescription->where('project',$project)->first();
        if($designAppTaskDescription != null){
            $designAppTaskDescription->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $designAppTaskDescription = $this->designAppTaskDescription->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }

    }

    public function DesignAppDeliverables($titleEn,$titleAr,$deliverables,$colors,$project)
    {
        $designAppDeliverables = $this->designAppDeliverables->where('project',$project)->first();
        $deliverables == "null" ? $checkDeliverables = json_encode([]) : $checkDeliverables = json_encode($deliverables);
        if($designAppDeliverables != null){
            $designAppDeliverables->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'deliverables' => $checkDeliverables,
                'colors' => $colors,
                'project' => $project
            ]);
        }else{
            $designAppDeliverables = $this->designAppDeliverables->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'deliverables' => $checkDeliverables,
                'colors' => $colors,
                'project' => $project
            ]);
        }
    }

    public function DesignAppImage($image,$project)
    {
        $designAppImage = $this->designAppImage->where('project',$project)->first();
        if($designAppImage != null){
            $imageName = $designAppImage->image;
            if(is_file($image)){
                if($designAppImage->image != null){
                    unlink($designAppImage->image);
                }
                $imageName = 'media/ProductPage/DesignAppImage/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppImage',$imageName);
            }
            $designAppImage->update([
                'image' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($image)){
                $imageName = 'media/ProductPage/DesignAppImage/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppImage',$imageName);
            }
            $designAppImage = $this->designAppImage->create([
                'image' => $imageName,
                'project' => $project
            ]);
        }
    }

    public function DesignAppProjectInfo($cards,$cardsCount,$project)
    {
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppProjectInfo = $this->designAppProjectInfo->where('project',$project)->skip($key)->first();
                if($designAppProjectInfo != null){
                    $designAppProjectInfo->update([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'textEn' => $card['textEn'],
                        'textAr' => $card['textAr'],
                        'project' => $project
                    ]);
                }
                else{
                    $this->designAppProjectInfo->create([
                        'labelEn' => $card['labelEn'],
                        'labelAr' => $card['labelAr'],
                        'textEn' => $card['textEn'],
                        'textAr' => $card['textAr'],
                        'project' => $project
                    ]);
                }

            }
        }
    }
    public function DesignAppWhatIsTheProject($titleEn,$titleAr,$descriptionEn,$descriptionAr,$project)
    {
        $designAppWhatIsTheProject = $this->designAppWhatIsTheProject->where('project',$project)->first();
        if($designAppWhatIsTheProject != null){
            $designAppWhatIsTheProject->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $designAppWhatIsTheProject = $this->designAppWhatIsTheProject->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }
    }
    public function DesignAppChallenges($titleEn,$titleAr,$descriptionEn,$descriptionAr,$color,$project,$cards,$cardsCount)
    {
        $designAppChallenges = $this->designAppChallenges->where('project',$project)->first();
        if($designAppChallenges != null){
            $designAppChallenges->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'color' => $color,
                'project' => $project
            ]);
        }else{
            $designAppChallenges = $this->designAppChallenges->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'color' => $color,
                'project' => $project
            ]);
        }
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppChallengesCards = $this->designAppChallengesCards->where('card',$designAppChallenges->id)->skip($key)->first();
                if($designAppChallengesCards != null){
                    $designAppChallengesCards->update([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'staticColor' => $card['staticColor'],
                        'hoverColor' => $card['hoverColor'],
                        'card' => $designAppChallenges->id
                    ]);
                }
                else{
                    $this->designAppChallengesCards->create([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'staticColor' => $card['staticColor'],
                        'hoverColor' => $card['hoverColor'],
                        'card' => $designAppChallenges->id
                    ]);
                }

            }
        }
    }
    public function DesignAppLetCheck($titleEn,$titleAr,$image,$project)
    {
        $designAppLetCheck = $this->designAppLetCheck->where('project',$project)->first();
        if($designAppLetCheck != null){
            $imageName = $designAppLetCheck->image;
            if(is_file($image)){
                if($designAppLetCheck->image != null){
                    unlink($designAppLetCheck->image);
                }
                $imageName = 'media/ProductPage/DesignAppLetCheck/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppLetCheck',$imageName);
            }
            $designAppLetCheck->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($image)){
                $imageName = 'media/ProductPage/DesignAppLetCheck/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppLetCheck',$imageName);
            }
            $designAppLetCheck = $this->designAppLetCheck->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }
    }
    public function DesignAppSections($cards,$cardsCount,$project)
    {
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppSections = $this->designAppSections->where('project',$project)->skip($key)->first();
                if($designAppSections != null){

                    $designAppSections->update([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'project' => $project
                    ]);
                }
                else{
                    $this->designAppSections->create([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'project' => $project
                    ]);
                }

            }
        }
    }
    public function DesignAppPersona($cards,$cardsCount,$project)
    {
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppPersona = $this->designAppPersona->where('project',$project)->skip($key)->first();
                if($designAppPersona != null){
                    $imageName = $designAppPersona->image;
                    if(is_file($card['image'])){
                        if($designAppPersona->image != null){
                            unlink($designAppPersona->image);
                        }
                        $imageName = 'media/ProductPage/DesignAppPersona/'.time().'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/DesignAppPersona',$imageName);
                    }
                    $designAppPersona->update([
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }
                else{
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/ProductPage/DesignAppPersona/'.time().'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/DesignAppPersona',$imageName);
                    }
                    $this->designAppPersona->create([
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function DesignAppSectionsTwo($project,$cards,$cardsCount)
    {
        
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppSectionsTwo = $this->designAppSectionsTwo->where('project',$project)->skip($key)->first();
                if($designAppSectionsTwo != null){
                    $imageName = $designAppSectionsTwo->image;
                    if(is_file($card['image'])){
                        if($designAppSectionsTwo->image != null){
                            unlink($designAppSectionsTwo->image);
                        }
                        $imageName = 'media/ProductPage/DesignAppSectionsTwo/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/DesignAppSectionsTwo',$imageName);
                    }
                    $designAppSectionsTwo->update([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }else{
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/ProductPage/DesignAppSectionsTwo/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/DesignAppSectionsTwo',$imageName);
                    }
                    $designAppSectionsTwo = $this->designAppSectionsTwo->create([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }

            }
        }
    }
    public function DesignAppMobileApps($titleEn,$titleAr,$descriptionEn,$descriptionAr,$project,$cards,$cardsCount)
    {
        $designAppMobileApps = $this->designAppMobileApps->where('project',$project)->first();
        if($designAppMobileApps != null){
            $designAppMobileApps->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $designAppMobileApps = $this->designAppMobileApps->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppMobileAppsCards = $this->designAppMobileAppsCards->where('card',$designAppMobileApps->id)->skip($key)->first();
                if($designAppMobileAppsCards != null){
                    $imageName = $designAppMobileAppsCards->image;
                    if(is_file($card['image'])){
                        if($designAppMobileAppsCards->image != null){
                            unlink($designAppMobileAppsCards->image);
                        }
                        $imageName = 'media/ProductPage/DesignAppMobileApps/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/DesignAppMobileApps',$imageName);
                    }
                    $designAppMobileAppsCards->update([
                        'image' => $imageName,
                        'card' => $designAppMobileApps->id
                    ]);
                }else{
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/ProductPage/DesignAppMobileApps/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/DesignAppMobileApps',$imageName);
                    }
                    $designAppMobileAppsCards = $this->designAppMobileAppsCards->create([
                        'image' => $imageName,
                        'card' => $designAppMobileApps->id
                    ]);
                }

            }
        }
    }
    public function DesignAppMobileExportScreen($titleEn,$titleAr,$descriptionEn,$descriptionAr,$image,$project)
    {
        $designAppMobileExportScreen = $this->designAppMobileExportScreen->where('project',$project)->first();
        if($designAppMobileExportScreen != null){
            $imageName = $designAppMobileExportScreen->image;
            if(is_file($image)){
                if($designAppMobileExportScreen->image != null){
                    unlink($designAppMobileExportScreen->image);
                }
                $imageName = 'media/ProductPage/DesignAppMobileExportScreen/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppMobileExportScreen',$imageName);
            }
            $designAppMobileExportScreen->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($image)){
                $imageName = 'media/ProductPage/DesignAppMobileExportScreen/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppMobileExportScreen',$imageName);
            }
            $designAppMobileExportScreen = $this->designAppMobileExportScreen->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }
    }

    
    public function DesignAppImagesSection($image,$titleEn,$titleAr,$descriptionEn,$descriptionAr,$project)
    {
        $designAppImagesSection = $this->designAppImagesSection->where('project',$project)->first();
        if($designAppImagesSection != null){
            $imageName = $designAppImagesSection->image;
            if(is_file($image)){
                if($designAppImagesSection->image != null){
                    unlink($designAppImagesSection->image);
                }
                $imageName = 'media/ProductPage/DesignAppImagesSection/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppImagesSection',$imageName);
            }
            $designAppImagesSection->update([
                'image' => $imageName,
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($image)){
                $imageName = 'media/ProductPage/DesignAppImagesSection/'.time().'-image-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/DesignAppImagesSection',$imageName);
            }
            $designAppImagesSection = $this->designAppImagesSection->create([
                'image' => $imageName,
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }
    }
    public function DesignAppResults($project,$cards,$cardsCount)
    {
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppResults = $this->designAppResults->where('project',$project)->skip($key)->first();
                if($designAppResults != null){
                    $designAppResults->update([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'staticColor' => $card['staticColor'],
                        'hoverColor' => $card['hoverColor'],
                        'project' => $project
                    ]);
                }
                else{
                    $this->designAppResults->create([
                        'titleEn' => $card['titleEn'],
                        'titleAr' => $card['titleAr'],
                        'descriptionEn' => $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'],
                        'staticColor' => $card['staticColor'],
                        'hoverColor' => $card['hoverColor'],
                        'project' => $project
                    ]);
                }

            }
        }
    }

    

    public function addproductGeneralInformation(Request $request)
    {

        $layoutiCategories = $this->layoutiCategories->find($request->category);
        if($layoutiCategories == null){
            return $this->ResponseData(null,'Category Not Found',false,400);
        }

        $productGeneralInformation = $this->productGeneralInformation->find($request->key);
        if($productGeneralInformation != null ){

            $imageName = $productGeneralInformation->image;
            $thumbnailImageName  = $productGeneralInformation->thumbnailImage;


            if(is_file($request->image)){
                if($productGeneralInformation->image != null){
                    unlink($productGeneralInformation->image);
                }
                $imageName = 'media/ProductPage/GeneralInformation/'.time().'-image-'.$request->image->getClientOriginalName();
                $request->image->move('media/ProductPage/GeneralInformation',$imageName);
            }

            if(is_file($request->thumbnailImage)){
                if($productGeneralInformation->thumbnailImage != null){
                    unlink($productGeneralInformation->thumbnailImage);
                }
                $thumbnailImageName = 'media/ProductPage/GeneralInformation/'.time().'-thumbnailImage-'.$request->thumbnailImage->getClientOriginalName();
                $request->thumbnailImage->move('media/ProductPage/GeneralInformation',$thumbnailImageName);
            }

            $productGeneralInformation->update([
                'category' => $request->category,
                'template'=> $request->template,
                'launch' => $request->launch,
                'image'=> $imageName,
                'thumbnailImage' => $thumbnailImageName,
                'color' => $request->color
            ]);
        }else{
            $imageName = null;
            $thumbnailImageName  = null;


            if(is_file($request->image)){

                $imageName = 'media/ProductPage/GeneralInformation/'.time().'-image-'.$request->image->getClientOriginalName();
                $request->image->move('media/ProductPage/GeneralInformation',$imageName);
            }

            if(is_file($request->thumbnailImage)){
                $thumbnailImageName = 'media/ProductPage/GeneralInformation/'.time().'-thumbnailImage-'.$request->thumbnailImage->getClientOriginalName();
                $request->thumbnailImage->move('media/ProductPage/GeneralInformation',$thumbnailImageName);
            }

            $productGeneralInformation = $this->productGeneralInformation->create([
                'category' => $request->category,
                'template'=> $request->template,
                'launch' => $request->launch,
                'image'=> $imageName,
                'thumbnailImage' => $thumbnailImageName,
                'color' => $request->color
            ]);
        }


        $this->addProjectInformation($request->ProjectName_nameEn,$request->ProjectName_nameAr,
        $request->ProjectName_slogenEn,$request->ProjectName_slogenAr,$request->ProjectName_descriptionEn,
        $request->ProjectName_descriptionAr,$productGeneralInformation->id);


        if($request->has('ProjectInformationCards')){
            $ProjectInformationCards_count   = count($request->ProjectInformationCards);
            $ProjectInformationCards  = $request->ProjectInformationCards;
            $this->addProductProjectName($ProjectInformationCards,$ProjectInformationCards_count,$productGeneralInformation->id);
        }

        if($request->has('TeamMemberCards')){
            $TeamMemberCards_count   = count($request->TeamMemberCards);
            $TeamMemberCards  = $request->TeamMemberCards;
            $this->addProductTeamMember($TeamMemberCards,$TeamMemberCards_count,$productGeneralInformation->id);
        }


        $InDepthCards_count = 0;
        $InDepthCards = [];
        if($request->has('InDepthCards')){
            $InDepthCards_count   = count($request->InDepthCards);
            $InDepthCards  = $request->InDepthCards;
        }
        $this->addProductInDepth($request->InDepth_titleEn,$request->InDepth_titleAr,$InDepthCards,$InDepthCards_count,$productGeneralInformation->id);


        $this->addProductScopeOfWork($request->ScopeOfWork_titleEn,$request->ScopeOfWork_titleAr,$request->ScopeOfWork_descriptionEn,
        $request->ScopeOfWork_descriptionAr,$request->ScopeOfWork_category,$productGeneralInformation->id);


        $this->addProductOurClients($request->OurClients_userNameEn,$request->OurClients_userNameAr,
        $request->OurClients_positionEn,$request->OurClients_positionAr,
        $request->OurClients_descriptionEn,$request->OurClients_descriptionAr,
        $request->OurClients_image,$productGeneralInformation->id);



        $ThanksSectionCards_count = 0;
        $ThanksSectionCards = [];
        if($request->has('ThanksSectionCards')){
            $ThanksSectionCards_count   = count($request->ThanksSectionCards);
            $ThanksSectionCards  = $request->ThanksSectionCards;
        }
        $this->addProductThanksSection($request->ThanksSection_titleEn,$request->ThanksSection_titleAr,
        $request->ThanksSection_buttonNameEn,$request->ThanksSection_buttonNameAr,
        $request->ThanksSection_descriptionEn,$request->ThanksSection_descriptionAr,
        $ThanksSectionCards,$ThanksSectionCards_count,$productGeneralInformation->id);


        $this->addProductSEO($request->ProductSEO_focusKeypharseEn,$request->ProductSEO_focusKeypharseAr,$request->ProductSEO_seoTitleEn,
        $request->ProductSEO_seoTitleAr,$request->ProductSEO_slugEn,$request->ProductSEO_slugAr,$request->ProductSEO_descriptionEn,
        $request->ProductSEO_descriptionAr,$request->ProductSEO_facebookTitleEn,$request->ProductSEO_facebookTitleAr,
        $request->ProductSEO_facebookDescriptionEn,$request->ProductSEO_facebookDescriptionAr,
        $request->ProductSEO_facebookImage,$productGeneralInformation->id);


        if($request->template == 2){
            if($request->has('BodyBrandingCards')){
                $BodyBrandingCards_count   = count($request->BodyBrandingCards);
                $BodyBrandingCards  = $request->BodyBrandingCards;
                $this->addProductBodyBranding($BodyBrandingCards,$BodyBrandingCards_count,$productGeneralInformation->id);
            }
            if($request->has('BodyBrandingImagesCards')){
                $BodyBrandingImagesCards_count   = count($request->BodyBrandingImagesCards);
                $BodyBrandingImagesCards  = $request->BodyBrandingImagesCards;
                $this->addProductBodyBrandingImages($BodyBrandingImagesCards,$BodyBrandingImagesCards_count,$productGeneralInformation->id);
            }



        }
        elseif($request->template == 1){

            $DesignAppIntorducingPoints_count =  0;
            $DesignAppIntorducingPoints = [];
            if($request->has('DesignAppIntorducingPoints')){
                $DesignAppIntorducingPoints_count   = count($request->DesignAppIntorducingPoints);
                $DesignAppIntorducingPoints  = $request->DesignAppIntorducingPoints;
            }
            $this->DesignAppIntorducing($request->DesignAppIntorducing_titleEn,$request->DesignAppIntorducing_titleAr,
            $request->DesignAppIntorducing_subTitleEn,$request->DesignAppIntorducing_subTitleAr,
            $productGeneralInformation->id,$DesignAppIntorducingPoints,$DesignAppIntorducingPoints_count);


            $this->DesignAppTaskDescription($request->DesignAppTaskDescription_titleEn,$request->DesignAppTaskDescription_titleAr,
                $request->DesignAppTaskDescription_descriptionEn,$request->DesignAppTaskDescription_descriptionAr,
                $productGeneralInformation->id);

            $this->DesignAppDeliverables($request->DesignAppDeliverables_titleEn,$request->DesignAppDeliverables_titleAr,
                $request->DesignAppDeliverables_deliverables,$request->DesignAppDeliverables_colors,
                $productGeneralInformation->id);

            $this->DesignAppImage($request->DesignAppImage_image,$productGeneralInformation->id);

            
            if($request->has('DesignAppProjectInfo')){
                $DesignAppProjectInfo_count   = count($request->DesignAppProjectInfo);
                $DesignAppProjectInfo  = $request->DesignAppProjectInfo;
                $this->DesignAppProjectInfo($DesignAppProjectInfo,$DesignAppProjectInfo_count,$productGeneralInformation->id);
            }

            $this->DesignAppWhatIsTheProject($request->DesignAppWhatIsTheProject_titleEn,$request->DesignAppWhatIsTheProject_titleAr,
                $request->DesignAppWhatIsTheProject_descriptionEn,$request->DesignAppWhatIsTheProject_descriptionAr,
                $productGeneralInformation->id);

            $DesignAppChallengesCards_count =  0;
            $DesignAppChallengesCards = [];
            if($request->has('DesignAppChallengesCards')){
                $DesignAppChallengesCards_count   = count($request->DesignAppChallengesCards);
                $DesignAppChallengesCards  = $request->DesignAppChallengesCards;
            }
            $this->DesignAppChallenges($request->DesignAppChallenges_titleEn,$request->DesignAppChallenges_titleAr,
                $request->DesignAppChallenges_descriptionEn,$request->DesignAppChallenges_descriptionAr,$request->DesignAppChallenges_color,
                $productGeneralInformation->id,$DesignAppChallengesCards,$DesignAppChallengesCards_count);
    
            $this->DesignAppLetCheck($request->DesignAppLetCheck_titleEn,$request->DesignAppLetCheck_titleAr,
                $request->DesignAppLetCheck_image,$productGeneralInformation->id);

            if($request->has('DesignAppSections')){
                $DesignAppSections_count   = count($request->DesignAppSections);
                $DesignAppSections  = $request->DesignAppSections;
                $this->DesignAppSections($DesignAppSections,$DesignAppSections_count,$productGeneralInformation->id);
            }

            if($request->has('DesignAppPersona')){
                $DesignAppPersona_count   = count($request->DesignAppPersona);
                $DesignAppPersona  = $request->DesignAppPersona;
                $this->DesignAppPersona($DesignAppPersona,$DesignAppPersona_count,$productGeneralInformation->id);
            }

            if($request->has('DesignAppSectionsTwo')){
                $DesignAppSectionsTwo_count   = count($request->DesignAppSectionsTwo);
                $DesignAppSectionsTwo  = $request->DesignAppSectionsTwo;
                if($DesignAppSectionsTwo_count > 0){
                    $this->DesignAppSectionsTwo($productGeneralInformation->id,$DesignAppSectionsTwo,$DesignAppSectionsTwo_count);
                }
            }

            $DesignAppMobileAppsCards_count =  0;
            $DesignAppMobileAppsCards = [];
            if($request->has('DesignAppMobileAppsCards')){
                $DesignAppMobileAppsCards_count   = count($request->DesignAppMobileAppsCards);
                $DesignAppMobileAppsCards  = $request->DesignAppMobileAppsCards;
            }
            $this->DesignAppMobileApps($request->DesignAppMobileApps_titleEn,$request->DesignAppMobileApps_titleAr,
                $request->DesignAppMobileApps_descriptionEn,$request->DesignAppMobileApps_descriptionAr,
                $productGeneralInformation->id,$DesignAppMobileAppsCards,$DesignAppMobileAppsCards_count);


            $this->DesignAppMobileExportScreen($request->DesignAppMobileExportScreen_titleEn,$request->DesignAppMobileExportScreen_titleAr,
                $request->DesignAppMobileExportScreen_descriptionEn,$request->DesignAppMobileExportScreen_descriptionAr,
                $request->DesignAppMobileExportScreen_image,$productGeneralInformation->id);

            $this->DesignAppImagesSection($request->DesignAppImagesSection_image,$request->DesignAppImagesSection_titleEn,
                $request->DesignAppImagesSection_titleAr,$request->DesignAppImagesSection_descriptionEn,
                $request->DesignAppImagesSection_descriptionAr,$productGeneralInformation->id);
    
            if($request->has('DesignAppResults')){
                $DesignAppResults_count   = count($request->DesignAppResults);
                $DesignAppResults  = $request->DesignAppResults;
                $this->DesignAppResults($productGeneralInformation->id,$DesignAppResults,$DesignAppResults_count);
            }


            
           

        }

        return $this->ResponseData(null,'Add Product Operation Success',true,200);


    }

    public function DeleteProjctName(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Projct Name Operation Failed',false,400,$validator->errors());
        }else{
            $productProjectName = $this->productProjectName->find($request->id);
            if($productProjectName == null){
                return $this->ResponseData(null,'Product Project Name Not Found',false,400);
            }
            $productProjectName->delete();
            return $this->ResponseData(null,'Delete Product Projct Name Operation success',true,200);

        }
    }

    public function DeleteTeamMembers(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Team Members Operation Failed',false,400,$validator->errors());
        }else{
            $productTeamMember = $this->productTeamMember->find($request->id);
            if($productTeamMember == null){
                return $this->ResponseData(null,'Product Team Members Not Found',false,400);
            }
            $productTeamMember->delete();
            return $this->ResponseData(null,'Delete Product Team Members Operation success',true,200);

        }
    }

    public function DeleteInDepthCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product In Depth Card Operation Failed',false,400,$validator->errors());
        }else{
            $productInDepthCard = $this->productInDepthCard->find($request->id);
            if($productInDepthCard == null){
                return $this->ResponseData(null,'Product In Depth Card Not Found',false,400);
            }
            if($productInDepthCard->image != null){
                unlink($productInDepthCard->image);
            }
            $productInDepthCard->delete();
            return $this->ResponseData(null,'Delete Product In Depth Card Operation success',true,200);

        }
    }


    public function DeleteProductBodyBranding(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Body Branding Operation Failed',false,400,$validator->errors());
        }else{
            $productBodyBranding = $this->productBodyBranding->find($request->id);
            if($productBodyBranding == null){
                return $this->ResponseData(null,'Product Body Branding Not Found',false,400);
            }
            $productBodyBranding->delete();
            return $this->ResponseData(null,'Delete Product Body Branding Operation success',true,200);

        }
    }

    public function DeleteProductBodyBrandingImage(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Body Branding Image Operation Failed',false,400,$validator->errors());
        }else{
            $productBodyBrandingImages = $this->productBodyBrandingImages->find($request->id);
            if($productBodyBrandingImages == null){
                return $this->ResponseData(null,'Product Body Branding Image Not Found',false,400);
            }
            if($productBodyBrandingImages->image != null){
                unlink($productBodyBrandingImages->image);
            }
            $productBodyBrandingImages->delete();
            return $this->ResponseData(null,'Delete Product Body Branding Image Operation success',true,200);

        }
    }

    public function DeleteProductThanksSectionCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Thanks Section Card Operation Failed',false,400,$validator->errors());
        }else{
            $productThanksSectionCard = $this->productThanksSectionCard->find($request->id);
            if($productThanksSectionCard == null){
                return $this->ResponseData(null,'Product Thanks Section Card Not Found',false,400);
            }
            $productThanksSectionCard->delete();
            return $this->ResponseData(null,'Delete Product Thanks Section Card Operation success',true,200);

        }
    }

    /*------------------------------- */

    public function DeleteDesignAppIntorducingPoints(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Intorducing Points Operation Failed',false,400,$validator->errors());
        }else{
            $designAppIntorducingPoints = $this->designAppIntorducingPoints->find($request->id);
            if($designAppIntorducingPoints == null){
                return $this->ResponseData(null,'Product Design App Intorducing Points Not Found',false,400);
            }
            
            $designAppIntorducingPoints->delete();
            return $this->ResponseData(null,'Delete Product Design App Intorducing Points Operation success',true,200);

        }
    }

    public function DeleteDesignAppProjectInfo(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Project Info Operation Failed',false,400,$validator->errors());
        }else{
            $designAppProjectInfo = $this->designAppProjectInfo->find($request->id);
            if($designAppProjectInfo == null){
                return $this->ResponseData(null,'Product Design App Project Info Not Found',false,400);
            }
            
            $designAppProjectInfo->delete();
            return $this->ResponseData(null,'Delete Product Design App Project Info Operation success',true,200);

        }
    }

    public function DeleteDesignAppChallengesCards(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Challenges Cards Operation Failed',false,400,$validator->errors());
        }else{
            $designAppChallengesCards = $this->designAppChallengesCards->find($request->id);
            if($designAppChallengesCards == null){
                return $this->ResponseData(null,'Product Design App Challenges Cards Not Found',false,400);
            }
            
            $designAppChallengesCards->delete();
            return $this->ResponseData(null,'Delete Product Design App Challenges Cards Operation success',true,200);

        }
    }

    public function DeleteDesignAppSections(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Section Operation Failed',false,400,$validator->errors());
        }else{
            $designAppSections = $this->designAppSections->find($request->id);
            if($designAppSections == null){
                return $this->ResponseData(null,'Product Design App Section Not Found',false,400);
            }
            
            $designAppSections->delete();
            return $this->ResponseData(null,'Delete Product Design App Section Operation success',true,200);

        }
    }

    public function DeleteDesignAppPersona(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Persona Image Operation Failed',false,400,$validator->errors());
        }else{
            $designAppPersona = $this->designAppPersona->find($request->id);
            if($designAppPersona == null){
                return $this->ResponseData(null,'Product Design App Persona Image Not Found',false,400);
            }

            if($designAppPersona->image != null){
                unlink($designAppPersona->image);
            }
            
            $designAppPersona->delete();
            return $this->ResponseData(null,'Delete Product Design App Persona Image Operation success',true,200);

        }
    }

    public function DeleteDesignAppSectionsTwo(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Section Operation Failed',false,400,$validator->errors());
        }else{
            $designAppSectionsTwo = $this->designAppSectionsTwo->find($request->id);
            if($designAppSectionsTwo == null){
                return $this->ResponseData(null,'Product Design App Section Not Found',false,400);
            }

            
            
            $designAppSectionsTwo->delete();
            return $this->ResponseData(null,'Delete Product Design App Section Operation success',true,200);

        }
    }

    public function DeleteDesignAppMobileAppsCards(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Mobile Apps Card Operation Failed',false,400,$validator->errors());
        }else{
            $designAppMobileAppsCards = $this->designAppPersona->find($request->id);
            if($designAppMobileAppsCards == null){
                return $this->ResponseData(null,'Product Design App Mobile Apps Card Not Found',false,400);
            }

            if($designAppMobileAppsCards->image != null){
                unlink($designAppMobileAppsCards->image);
            }
            
            $designAppMobileAppsCards->delete();
            return $this->ResponseData(null,'Delete Product Design App Mobile Apps Card Operation success',true,200);

        }
    }

    public function DeleteDesignAppResults(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Design App Result Operation Failed',false,400,$validator->errors());
        }else{
            $designAppResults = $this->designAppResults->find($request->id);
            if($designAppResults == null){
                return $this->ResponseData(null,'Product Design App Result Not Found',false,400);
            }

            
            
            $designAppResults->delete();
            return $this->ResponseData(null,'Delete Product Design App Result Operation success',true,200);

        }
    }





    public function DeleteProduct(Request $request){

        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product  Operation Failed',false,400,$validator->errors());
        }else{
            $productGeneralInformation = $this->productGeneralInformation->find($request->id);
            if($productGeneralInformation == null){
                return $this->ResponseData(null,'Product Not Found',false,400);
            }

        

            $productGeneralInformation->delete();
            return $this->ResponseData(null,'Delete Product Operation success',true,200);

        }
        
    }











}
