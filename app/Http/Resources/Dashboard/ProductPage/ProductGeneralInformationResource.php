<?php

namespace App\Http\Resources\Dashboard\ProductPage;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Dashboard\Configurations\LayoutiCategoriesResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppChallengesResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppDeliverablesResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppImageResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppImagesSectionResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppIntorducingResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppLetCheckResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppMobileAppsResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppMobileExportScreenResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppPersonaResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppProjectInfoResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppResultsResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppSectionsResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppSectionsTwoResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppTaskDescriptionResource;
use App\Http\Resources\Dashboard\ProductPage\BodyDesignApp\DesignAppWhatIsTheProjectResource;

class ProductGeneralInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $template_body = [];
        if($this->template == 1){
            $template_body = [
                'DesignAppIntorducing' => new DesignAppIntorducingResource($this->DesignAppIntorducing),
                'DesignAppTaskDescription' => new DesignAppTaskDescriptionResource($this->DesignAppTaskDescription),
                'DesignAppDeliverables' => new DesignAppDeliverablesResource($this->DesignAppDeliverables),
                'DesignAppImage' => new DesignAppImageResource($this->DesignAppImage),
                'DesignAppProjectInfo' =>  DesignAppProjectInfoResource::collection($this->DesignAppProjectInfo),
                'DesignAppWhatIsTheProject' => new DesignAppWhatIsTheProjectResource($this->DesignAppWhatIsTheProject),
                'DesignAppChallenges' => new DesignAppChallengesResource($this->DesignAppChallenges),
                'DesignAppLetCheck' =>   new DesignAppLetCheckResource($this->DesignAppLetCheck),
                'DesignAppSections' => DesignAppSectionsResource::collection($this->DesignAppSections),
                'DesignAppPersona' => DesignAppPersonaResource::collection($this->DesignAppPersona),
                'DesignAppSectionsTwo' => DesignAppSectionsTwoResource::collection($this->DesignAppSectionsTwo),
                'DesignAppMobileApps' =>   new DesignAppMobileAppsResource($this->DesignAppMobileApps),
                'DesignAppMobileExportScreen' =>   new DesignAppMobileExportScreenResource ($this->DesignAppMobileExportScreen),
                'DesignAppImagesSection' =>   new DesignAppImagesSectionResource ($this->DesignAppImagesSection),
                'DesignAppResults' =>  new DesignAppResultsResource($this->DesignAppResults),

            ];
        }
        elseif($this->template ==  2){
            $template_body = [
                'BodyBranding' => ProductBodyBrandingResource::collection($this->BodyBranding),
                'BodyBrandingImages' => ProductBodyBrandingImagesResource::collection($this->BodyBrandingImages),
            ];
        }

        $categories = [];
        if(count($this->Category) > 0){
            foreach ($this->Category as $category){
                array_push($categories, new LayoutiCategoriesResource($category->Category));
            }
        }
        return [
            'id' => $this->id,
            'status' => $this->status,
            'Category' => $categories,
            'template' => $this->template,
            'launch' => $this->launch,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'thumbnailImage' => $this->thumbnailImage != null ? env('APP_URL').$this->thumbnailImage : null,
            'color'=> $this->color,
            'ProjectName' => new ProductInformationResource($this->ProjectInformation),
            'ProjectInformation' => ProductProjectNameResource::collection($this->ProjectName),
            'TeamMembers' => ProductTeamMembersResource::collection($this->TeamMembers),
            'InDepth' => new ProductInDepthResource($this->InDepth),
            'ScopeOfWork' => new ProductScopeOfWorkResource($this->ScopeOfWork),

            'TemplateBody' => $template_body,
            'OurClients' => new ProductOurClientsResource($this->OurClients),
            'ThanksSection' => new ProductThanksSectionResource($this->ThanksSection),
            'SEO' => new ProductSEOResource($this->SEO),
            'Viewers' => count($this->Viewers),
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))

        ];
    }
}
