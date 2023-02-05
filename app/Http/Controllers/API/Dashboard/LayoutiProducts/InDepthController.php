<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductInDepth;
use App\Models\ProductPage\ProductInDepthCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InDepthController extends Controller
{
    use Response;

    public $productInDepth;
    public $productInDepthCard;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productInDepth = new ProductInDepth();
        $this->productInDepthCard = new ProductInDepthCard();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $InDepthCards_count = 0;
        $InDepthCards = [];
        if($request->has('cards')){
            $InDepthCards_count   = count($request->cards);
            $InDepthCards  = $request->cards;
        }
        $this->addProductInDepth($request->titleEn,$request->titleAr,$InDepthCards,$InDepthCards_count,$productGeneralInformation->id);

        return $this->ResponseData(null,'Save Project InDepth Operation Success',true,200);


    }

    public function addProductInDepth($titleEn,$titleAr,$cards,$cardsCount,$project)
    {

        $productInDepth = $this->productInDepth->where('project',$project)->first();

        $titleEn == "null" ?  $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ?  $titleAr = null : $titleAr = $titleAr;

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

                $card['headLineEn'] == "null" ?  $headLineEn = null : $headLineEn = $card['headLineEn'];
                $card['headLineAr'] == "null" ?  $headLineAr = null : $headLineAr = $card['headLineAr'];
                $card['descriptionEn'] == "null" ?  $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                $card['descriptionAr'] == "null" ?  $descriptionAr = null : $descriptionAr = $card['descriptionAr'];


                if($productInDepthCard != null){

                    if($card['image'] == "null"){
                        $imageName = null;
                        if($productInDepthCard->image != null){
                            unlink($productInDepthCard->image);
                        }
        
                    }else{
                        $imageName = $productInDepthCard->image;
                        if(is_file($card['image'])){
                            if($productInDepthCard->image != null){
                                unlink($productInDepthCard->image);
                            }
                            $imageName = 'media/ProductPage/InDepth/'.time().'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/ProductPage/InDepth',$imageName);
                        }
                    }

                    
                    $productInDepthCard->update([
                        'image' => $imageName,
                        'headLineEn' => $headLineEn,
                        'headLineAr' => $headLineAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
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
                        'headLineEn' => $headLineEn,
                        'headLineAr' => $headLineAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'category' => $card['category'],
                        'card' => $productInDepth->id
                    ]);
                }

            }
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
}
