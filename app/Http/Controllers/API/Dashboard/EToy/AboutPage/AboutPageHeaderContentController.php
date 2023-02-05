<?php

namespace App\Http\Controllers\API\Dashboard\EToy\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\AboutPage\AboutPageHeaderContent;
use Illuminate\Http\Request;

class AboutPageHeaderContentController extends Controller
{
    use Response;
    public $aboutPageHeaderContent;

    public function __construct()
    {
        $this->aboutPageHeaderContent = new AboutPageHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $aboutPageHeaderContent = $this->aboutPageHeaderContent->first();
        if(!$aboutPageHeaderContent){

            $this->aboutPageHeaderContent->create([
                'color' => $request->color ,
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);


        }else{



            $aboutPageHeaderContent->update([
                'color' => $request->color ,
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);


        }
        return $this->ResponseData(null,'Update Etoy About Page Header Content Opreation Success',true,200);
    }
}
