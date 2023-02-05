<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\LearnUI\ProjectsResource;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignProject;
use App\Models\LearnUI\LearnUIHighlitsDesign;
use Illuminate\Http\Request;

class HighlitsDesignController extends Controller
{
    use Response;
    public $learnUIHighlitsDesign;
    public $designProject;

    public function __construct()
    {
        $this->learnUIHighlitsDesign = new LearnUIHighlitsDesign();
        $this->designProject = new DesignProject();
        $this->middleware('checkAuth');
    }

    public function index()
    {
        $designProject = $this->designProject->latest()->get();
        return $this->ResponseData(ProjectsResource::collection($designProject), 'Get All 365Design Projects Operation Success',true, 200);
        
    }

    public function save(Request $request)
    {

        $learnUIHighlitsDesign = $this->learnUIHighlitsDesign->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->subTitleEn != "null" ? $subTitleEn = $request->subTitleEn : $subTitleEn = null;
        $request->subTitleAr != "null" ? $subTitleAr = $request->subTitleAr : $subTitleAr = null;

        if(!$learnUIHighlitsDesign){

            $learnUIHighlitsDesign = $this->learnUIHighlitsDesign->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'highlits' => json_encode($request->highlits)
            ]);


        }else{
            $learnUIHighlitsDesign->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'highlits' => json_encode($request->highlits)
            ]);


        }
        return $this->ResponseData(null,'Update LearnUI Highlits Design Opreation Success',true,200);
    }
}
