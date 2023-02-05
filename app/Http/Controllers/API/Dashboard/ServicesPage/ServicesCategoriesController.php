<?php

namespace App\Http\Controllers\API\Dashboard\ServicesPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use Illuminate\Http\Request;
use App\Models\Configurations\LayoutiCategoriesServices;
use App\Models\ServicesPage\ServicesCategories;
use App\Models\ServicesPage\ServicesCategoriesCards;
use Illuminate\Support\Facades\Validator;

class ServicesCategoriesController extends Controller
{
    use Response;
    public $servicesCategoriesCards;
    public $servicesCategories;
    public $layoutiCategories;

    public function __construct()
    {
        $this->servicesCategoriesCards = new ServicesCategoriesCards();
        $this->servicesCategories = new ServicesCategories();
        $this->layoutiCategories = new LayoutiCategoriesServices();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $servicesCategories = $this->servicesCategories->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if($servicesCategories != null){
            $servicesCategories->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);
        }else{
            $servicesCategories = $this->servicesCategories->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);
        }

        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }

        if($cards_count > 0){
            foreach($cards as $key => $card){
                $servicesCategoriesCards = $this->servicesCategoriesCards->skip($key)->first();

                $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                if($servicesCategoriesCards != null){

                    $card['projects'] == null ? $projects = json_encode([]) : $projects = json_encode($card['projects']);
                    $card['tagsEn'] == null ? $tagsEn = json_encode([]) : $tagsEn = json_encode($card['tagsEn']);
                    $card['tagsAr'] == null ? $tagsAr = json_encode([]) : $tagsAr = json_encode($card['tagsAr']);

                    if($card['category'] != null){

                        $layoutiCategories = $this->layoutiCategories->find($card['category']);
                        if(!$layoutiCategories){
                            return $this->ResponseData(null,'Layouti Category Not Found',false,400);
                        }

                    }

                    $servicesCategoriesCards->update([
                        'category' => $layoutiCategories->id,
                        'projects' => $projects ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'tagsEn' => $tagsEn ,
                        'tagsAr' => $tagsAr,
                        'card' => $servicesCategories->id
                    ]);

                }else{

                    $card['projects'] == null ? $projects = json_encode([]) : $projects = json_encode($card['projects']);
                    $card['tagsEn'] == null ? $tagsEn = json_encode([]) : $tagsEn = json_encode($card['tagsEn']);
                    $card['tagsAr'] == null ? $tagsAr = json_encode([]) : $tagsAr = json_encode($card['tagsAr']);

                    if($card['category'] != null){

                        $layoutiCategories = $this->layoutiCategories->find($card['category']);
                        if(!$layoutiCategories){
                            return $this->ResponseData(null,'Layouti Category Not Found',false,400);
                        }

                    }

                    $this->servicesCategoriesCards->create([
                        'category' => $layoutiCategories->id,
                        'projects' => $projects ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'tagsEn' => $tagsEn ,
                        'tagsAr' => $tagsAr,
                        'card' => $servicesCategories->id
                    ]);


                }
            }
        }

        return $this->ResponseData(null,'Update Services Categories Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Services Categories Card Opreation Failed.',false,400);
        }else{
            $servicesCategoriesCards = $this->servicesCategoriesCards->find($request->id);
            if(!$servicesCategoriesCards){
                return $this->ResponseData(null,'Delete Services Categories Card Opreation Failed',true,400);
            }


            $servicesCategoriesCards->delete();
            return $this->ResponseData(null,'Delete Services Categories Card Opreation Success',true,200);


        }
    }
}
