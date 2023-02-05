<?php

namespace App\Http\Resources\Frontend\ServicesPage;

use App\Http\Resources\Frontend\ProductPage\ProductGeneralInformationResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ProductPage\ProductGeneralInformation;

class CategoriesCardsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        $projects = ProductGeneralInformation::whereIn('id',json_decode($this->projects))->latest()->get();
        $projectsData = [];
        // foreach ($projects as $project) {
        //     $categories = $project->Category;
        //     foreach($categories as $category){
        //         if($category->Category->nameEn == $this->Category->nameEn ){
        //             array_push($projectsData,$project->id);
        //         }
        //     }
        // }
        foreach ($projects as $project) {
            
            array_push($projectsData,$project->id);
               
        }
        

        return [
            'category' =>new ServiceCategoryResource($this->Category),
            'projects' =>ProductGeneralInformationResource::collection(ProductGeneralInformation::whereIn('id',$projectsData)->get()),
            // 'projects' =>ProjectsResource::collection(ProductGeneralInformation::whereIn('id',ProductCategory::where('category',$this->id)->first()->Project->id)->latest()->get()),
            'description' =>$language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'tags' =>$language == 'ar' ? json_decode($this->tagsAr) : json_decode($this->tagsEn),
        ];
    }
}
