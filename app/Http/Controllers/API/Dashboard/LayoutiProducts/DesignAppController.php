<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
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
use App\Models\ProductPage\ProductGeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignAppController extends Controller
{
    use Response;

    public $productGeneralInformation;
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
    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        
        
            $this->DesignAppIntorducing($request->DesignAppIntorducing_titleEn,$request->DesignAppIntorducing_titleAr,
            $request->DesignAppIntorducing_descriptionEn,$request->DesignAppIntorducing_descriptionAr,
            $productGeneralInformation->id);


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
                $request->DesignAppChallenges_staticColor,$request->DesignAppChallenges_hoverColor,
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
    
           

            $DesignAppResultsCards_count =  0;
            $DesignAppResultsCards = [];
            if($request->has('DesignAppResultsCards')){
                $DesignAppResultsCards_count   = count($request->DesignAppResultsCards);
                $DesignAppResultsCards  = $request->DesignAppResultsCards;
            }
            $this->DesignAppResults($request->DesignAppResults_titleEn,$request->DesignAppResults_titleAr,
                $request->DesignAppResults_descriptionEn,$request->DesignAppResults_descriptionAr,$request->DesignAppResults_color,
                $request->DesignAppResults_staticColor,$request->DesignAppResults_hoverColor,
                $productGeneralInformation->id,$DesignAppResultsCards,$DesignAppResultsCards_count);
        

        
        return $this->ResponseData(null,'Save Project Mobile App Body Section Operation Success',true,200);


    }

    public function DesignAppIntorducing($titleEn,$titleAr,$descriptionEn,$descriptionAr,$project)
    {
        $designAppIntorducing = $this->designAppIntorducing->where('project',$project)->first();

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;

        if($designAppIntorducing != null){ 
            $designAppIntorducing->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $designAppIntorducing = $this->designAppIntorducing->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }
        
    }
    public function DesignAppTaskDescription($titleEn,$titleAr,$descriptionEn,$descriptionAr,$project)
    {
        $designAppTaskDescription = $this->designAppTaskDescription->where('project',$project)->first();

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;

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

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $colors == "null" ? $colors = null : $colors = $colors;

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

            if($image == "null"){
                $imageName = null;
                if($designAppImage->image != null){
                    unlink($designAppImage->image);
                }
            }
            else{
                $imageName = $designAppImage->image;
                if(is_file($image)){
                    if($designAppImage->image != null){
                        unlink($designAppImage->image);
                    }
                    $imageName = 'media/ProductPage/DesignAppImage/'.time().'-image-'.$image->getClientOriginalName();
                    $image->move('media/ProductPage/DesignAppImage',$imageName);
                }
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

                $card['labelEn'] == "null" ? $labelEn = null : $labelEn = $card['labelEn'];
                $card['labelAr'] == "null" ? $labelAr = null : $labelAr = $card['labelAr'];
                $card['textEn'] == "null" ? $textEn = null : $textEn = $card['textEn'];
                $card['textAr'] == "null" ? $textAr = null : $textAr = $card['textAr'];

                if($designAppProjectInfo != null){
                    $designAppProjectInfo->update([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'textEn' => $textEn,
                        'textAr' => $textAr,
                        'project' => $project
                    ]);
                }
                else{
                    $this->designAppProjectInfo->create([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'textEn' => $textEn,
                        'textAr' => $textAr,
                        'project' => $project
                    ]);
                }

            }
        }
    }
    public function DesignAppWhatIsTheProject($titleEn,$titleAr,$descriptionEn,$descriptionAr,$project)
    {
        $designAppWhatIsTheProject = $this->designAppWhatIsTheProject->where('project',$project)->first();

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;


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
    public function DesignAppChallenges($titleEn,$titleAr,$descriptionEn,$descriptionAr,$color,$staticColor,$hoverColor,$project,$cards,$cardsCount)
    {
        $designAppChallenges = $this->designAppChallenges->where('project',$project)->first();

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;
        $color == "null" ? $color = null : $color = $color;
        $staticColor == "null" ? $staticColor = null : $staticColor = $staticColor;
        $hoverColor == "null" ? $hoverColor = null : $hoverColor = $hoverColor;

        if($designAppChallenges != null){
            $designAppChallenges->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'color' => $color,
                'staticColor' => $staticColor,
                'hoverColor' => $hoverColor,
                'project' => $project
            ]);
        }else{
            $designAppChallenges = $this->designAppChallenges->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'color' => $color,
                'staticColor' => $staticColor,
                'hoverColor' => $hoverColor,
                'project' => $project
            ]);
        }
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppChallengesCards = $this->designAppChallengesCards->where('card',$designAppChallenges->id)->skip($key)->first();

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr'];

                if($designAppChallengesCards != null){
                    $designAppChallengesCards->update([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'card' => $designAppChallenges->id
                    ]);
                }
                else{
                    $this->designAppChallengesCards->create([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'card' => $designAppChallenges->id
                    ]);
                }

            }
        }
    }
    public function DesignAppLetCheck($titleEn,$titleAr,$image,$project)
    {
        $designAppLetCheck = $this->designAppLetCheck->where('project',$project)->first();

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;

        if($designAppLetCheck != null){

            if($image == "null"){
                $imageName = null;
                if($designAppLetCheck->image != null){
                    unlink($designAppLetCheck->image);
                }
            }
            else{
                $imageName = $designAppLetCheck->image;
                if(is_file($image)){
                    if($designAppLetCheck->image != null){
                        unlink($designAppLetCheck->image);
                    }
                    $imageName = 'media/ProductPage/DesignAppLetCheck/'.time().'-image-'.$image->getClientOriginalName();
                    $image->move('media/ProductPage/DesignAppLetCheck',$imageName);
                }
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

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr'];


                if($designAppSections != null){

                    $designAppSections->update([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'project' => $project
                    ]);
                }
                else{
                    $this->designAppSections->create([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
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

                $card['titleEn'] == null ? $titleEn = null : $titleEn =  $card['titleEn'];
                $card['titleAr'] == null ? $titleAr = null : $titleAr =  $card['titleAr'];
                $card['descriptionEn'] == null ? $descriptionEn = null : $descriptionEn =  $card['descriptionEn'];
                $card['descriptionAr'] == null ? $descriptionAr = null : $descriptionAr =  $card['descriptionAr'];
                $card['otherTitleEn'] == null ? $otherTitleEn = null : $otherTitleEn =  $card['otherTitleEn'];
                $card['otherTitleAr'] == null ? $otherTitleAr = null : $otherTitleAr =  $card['otherTitleAr'];
                $card['otherDescriptionEn'] == null ? $otherDescriptionEn = null : $otherDescriptionEn =  $card['otherDescriptionEn'];
                $card['otherDescriptionAr'] == null ? $otherDescriptionAr = null : $otherDescriptionAr =  $card['otherDescriptionAr'];

                if($designAppPersona != null){

                    if($card['image'] == "null"){
                        $imageName = null;
                        if($designAppPersona->image != null){
                            unlink($designAppPersona->image);
                        }
                    }
                    else{
                        $imageName = $designAppPersona->image;
                        if(is_file($card['image'])){
                            if($designAppPersona->image != null){
                                unlink($designAppPersona->image);
                            }
                            $imageName = 'media/ProductPage/DesignAppPersona/'.time().'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/ProductPage/DesignAppPersona',$imageName);
                        }
                    }

                    
                    $designAppPersona->update([
                        'image' => $imageName,
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'otherTitleEn' => $otherTitleEn,
                        'otherTitleAr' => $otherTitleAr,
                        'otherDescriptionEn' => $otherDescriptionEn,
                        'otherDescriptionAr' => $otherDescriptionAr,
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
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'otherTitleEn' => $otherTitleEn,
                        'otherTitleAr' => $otherTitleAr,
                        'otherDescriptionEn' => $otherDescriptionEn,
                        'otherDescriptionAr' => $otherDescriptionAr,
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

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr'];

                if($designAppSectionsTwo != null){

                    if($card['image'] == "null"){
                        $imageName = null;
                        if($designAppSectionsTwo->image != null){
                            unlink($designAppSectionsTwo->image);
                        }
                    }
                    else{
                        $imageName = $designAppSectionsTwo->image;
                        if(is_file($card['image'])){
                            if($designAppSectionsTwo->image != null){
                                unlink($designAppSectionsTwo->image);
                            }
                            $imageName = 'media/ProductPage/DesignAppSectionsTwo/'.time().'-image-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/ProductPage/DesignAppSectionsTwo',$imageName);
                        }
                    }

                    
                    $designAppSectionsTwo->update([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
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
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
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

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;


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

                    if($card['image'] == "null"){
                        $imageName = null;
                        if($designAppMobileAppsCards->image != null){
                            unlink($designAppMobileAppsCards->image);
                        }
                    }
                    else{
                        $imageName = $designAppMobileAppsCards->image;
                        if(is_file($card['image'])){
                            if($designAppMobileAppsCards->image != null){
                                unlink($designAppMobileAppsCards->image);
                            }
                            $imageName = 'media/ProductPage/DesignAppMobileApps/'.time().'-image-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/ProductPage/DesignAppMobileApps',$imageName);
                        }
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

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;


        if($designAppMobileExportScreen != null){

            if($image == "null"){
                $imageName = null;
                if($designAppMobileExportScreen->image != null){
                    unlink($designAppMobileExportScreen->image);
                }
            }
            else{
                $imageName = $designAppMobileExportScreen->image;
                if(is_file($image)){
                    if($designAppMobileExportScreen->image != null){
                        unlink($designAppMobileExportScreen->image);
                    }
                    $imageName = 'media/ProductPage/DesignAppMobileExportScreen/'.time().'-image-'.$image->getClientOriginalName();
                    $image->move('media/ProductPage/DesignAppMobileExportScreen',$imageName);
                }
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

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;

        if($designAppImagesSection != null){

            if($image == "null"){
                $imageName = null;
                if($designAppImagesSection->image != null){
                    unlink($designAppImagesSection->image);
                }
            }
            else{
                $imageName = $designAppImagesSection->image;
                if(is_file($image)){
                    if($designAppImagesSection->image != null){
                        unlink($designAppImagesSection->image);
                    }
                    $imageName = 'media/ProductPage/DesignAppImagesSection/'.time().'-image-'.$image->getClientOriginalName();
                    $image->move('media/ProductPage/DesignAppImagesSection',$imageName);
                }
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


    public function DesignAppResults($titleEn,$titleAr,$descriptionEn,$descriptionAr,$color,$staticColor,$hoverColor,$project,$cards,$cardsCount)
    {
        $designAppResults = $this->designAppResults->where('project',$project)->first();

        $titleEn == "null" ? $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ? $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $descriptionAr;
        $color == "null" ? $color = null : $color = $color;
        $staticColor == "null" ? $staticColor = null : $staticColor = $staticColor;
        $hoverColor == "null" ? $hoverColor = null : $hoverColor = $hoverColor;

        if($designAppResults != null){
            $designAppResults->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'color' => $color,
                'staticColor' => $staticColor,
                'hoverColor' => $hoverColor,
                'project' => $project
            ]);
        }else{
            $designAppResults = $this->designAppResults->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'color' => $color,
                'staticColor' => $staticColor,
                'hoverColor' => $hoverColor,
                'project' => $project
            ]);
        }
        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $designAppResultsCards = $this->designAppResultsCards->where('card',$designAppResults->id)->skip($key)->first();

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr'];

                if($designAppResultsCards != null){
                    $designAppResultsCards->update([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'card' => $designAppResults->id
                    ]);
                }
                else{
                    $this->designAppResultsCards->create([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'card' => $designAppResults->id
                    ]);
                }

            }
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
            $designAppMobileAppsCards = $this->designAppMobileAppsCards->find($request->id);
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
            return $this->ResponseData(null,'Delete Product Design App Result Card Operation Failed',false,400,$validator->errors());
        }else{
            $designAppResultsCards = $this->designAppResultsCards->find($request->id);
            if($designAppResultsCards == null){
                return $this->ResponseData(null,'Product Design App Result Card Not Found',false,400);
            }

            
            
            $designAppResultsCards->delete();
            return $this->ResponseData(null,'Delete Product Design App Result Card Operation success',true,200);

        }
    }


    
}
