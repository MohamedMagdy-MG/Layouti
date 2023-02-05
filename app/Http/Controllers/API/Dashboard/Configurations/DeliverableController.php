<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\DeliverableResource;
use App\Http\Traits\Response;
use App\Models\Configurations\Deliverable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliverableController extends Controller
{
    use Response;

    public $deliverable;

    public function __construct()
    {
        $this->deliverable = new Deliverable();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $deliverable = $this->deliverable->get();
        return $this->ResponseData(DeliverableResource::collection($deliverable),'Get All Layouti Deliverable Operation Success',true,200);

    }
    public function Add(Request $request)
    {
        $cards_count   = count($request->cards);
        $cards  = $request->cards;

        if($cards_count > 0){
            foreach($cards as $key => $card){
                $deliverable = $this->deliverable->skip($key)->first();
                if($deliverable != null){

                    $deliverable->update([
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,

                    ]);
                }else{
                    $this->deliverable->create([
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                    ]);
               }
           }
        }
        return $this->ResponseData(null,'Update Layouti Deliverable Operation Success',false,200);

    }



    public function Delete(Request $request)
    {

        $deliverable = $this->deliverable->find($request->id);
        if(!$deliverable){
            return $this->ResponseData(null,'Layouti Deliverable Not Found',false,400);
        }

        $deliverable->Delete();
        return $this->ResponseData(null,'Delete Layouti Deliverable Operation Success',true,200);

    }
}
