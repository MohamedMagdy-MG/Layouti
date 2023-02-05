<?php

namespace App\Http\Controllers\API\Dashboard\ContactPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ContactPage\ContactCompanyDeck;
use Illuminate\Http\Request;

class ContactCompanyDeckController extends Controller
{
    use Response;
    public $contactCompanyDeck;

    public function __construct()
    {
        $this->contactCompanyDeck = new ContactCompanyDeck();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $contactCompanyDeck = $this->contactCompanyDeck->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->pdf != "null" ? $pdf = $request->pdf : $pdf = null;

        if(!$contactCompanyDeck){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/ContactPage/CompanyDeck/Images/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/ContactPage/CompanyDeck/Images',$imageName);
            }



            $this->contactCompanyDeck->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName,
                'pdf' => $pdf
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($contactCompanyDeck->image){
                    unlink($contactCompanyDeck->image);
                }
            }
            else{
                $imageName = $contactCompanyDeck->image;
                if(is_file($request->image)){
                    if($contactCompanyDeck->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/ContactPage/CompanyDeck/Images/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/ContactPage/CompanyDeck/Images',$imageName);
                }
            }


            

            $contactCompanyDeck->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName,
                'pdf' => $pdf
            ]);
        }
        return $this->ResponseData(null,'Update Contact Company Deck Opreation Success',true,200);
    }
}
