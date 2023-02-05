<?php

namespace App\Http\Resources\Frontend\LearnUI;

use App\Http\Resources\Frontend\DaysDesign\DesignProjectResource;
use App\Models\DaysDesign\DesignProject;
use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIHighlitsDesignResource extends JsonResource
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

        $projectsData = json_decode($this->highlits);
        $projects = [];
        foreach($projectsData as $project){
            $find = DesignProject::where('id',$project)->first();
            if($find != null){
                array_push($projects,$find->id);
            }
        }

        $projects_reverse = array_reverse($projects, true);


        return [
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'subTitle' => $language == 'ar' ? $this->subTitleAr : $this->subTitleEn,
            'highlits' => DesignProjectResource::collection(DesignProject::whereIn('id',$projects_reverse)->latest()->get())
        ];
    }
}
