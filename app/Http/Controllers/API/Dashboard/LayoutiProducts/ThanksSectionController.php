<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductThanksSection;
use App\Models\ProductPage\ProductThanksSectionCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanksSectionController extends Controller
{
    use Response;

    public $productThanksSection;
    public $productThanksSectionCard;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productThanksSection = new ProductThanksSection();
        $this->productThanksSectionCard = new ProductThanksSectionCard();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $ThanksSectionCards_count = 0;
        $ThanksSectionCards = [];
        if($request->has('cards')){
            $ThanksSectionCards_count   = count($request->cards);
            $ThanksSectionCards  = $request->cards;
        }
        $this->addProductThanksSection($request->titleEn,$request->titleAr,
        $request->buttonNameEn,$request->buttonNameAr,
        $request->descriptionEn,$request->descriptionAr,
        $ThanksSectionCards,$ThanksSectionCards_count,$productGeneralInformation->id);

        

        return $this->ResponseData(null,'Save Project Thanks Section Operation Success',true,200);


    }

    public function addProductThanksSection($titleEn,$titleAr,$buttonNameEn,$buttonNameAr,$descriptionEn,$descriptionAr,$cards,$cardsCount,$project)
    {

        $productThanksSection = $this->productThanksSection->where('project',$project)->first();

        $titleEn == "null" ?  $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ?  $titleAr = null : $titleAr = $titleAr;
        $buttonNameEn == "null" ?  $buttonNameEn = null : $buttonNameEn = $buttonNameEn;
        $buttonNameAr == "null" ?  $buttonNameAr = null : $buttonNameAr = $buttonNameAr;
        $descriptionEn == "null" ?  $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ?  $descriptionAr = null : $descriptionAr = $descriptionAr;

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

                $card['labelEn'] == "null" ?  $labelEn = null : $labelEn = $card['labelEn'];
                $card['labelAr'] == "null" ?  $labelAr = null : $labelAr = $card['labelAr'];
                $card['textEn'] == "null" ?  $textEn = null : $textEn = $card['textEn'];
                $card['textAr'] == "null" ?  $textAr = null : $textAr = $card['textAr'];


                if($productThanksSectionCard != null){
                    $productThanksSectionCard->update([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'textEn' => $textEn,
                        'textAr' => $textAr,
                        'card' => $productThanksSection->id
                    ]);
                }
                else{

                    $this->productThanksSectionCard->create([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'textEn' => $textEn,
                        'textAr' => $textAr,
                        'card' => $productThanksSection->id
                    ]);
                }

            }
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
}
