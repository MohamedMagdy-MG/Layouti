<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Configurations\INeed\AddRequest;
use App\Http\Requests\Dashboard\Configurations\INeed\DeleteRequest;
use App\Http\Requests\Dashboard\Configurations\INeed\UpdateRequest;
use App\Http\Resources\Dashboard\Configurations\INeedResource;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiINeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class INeedController extends Controller
{
    use Response;

    public $layoutiINeed;
    public $addRequest;
    public $updateRequest;
    public $deleteRequest;

    public function __construct()
    {
        $this->layoutiINeed = new LayoutiINeed();
        $this->addRequest = new AddRequest();
        $this->updateRequest = new UpdateRequest();
        $this->deleteRequest = new DeleteRequest();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $layoutiINeed = $this->layoutiINeed->orderBy('order','ASC')->get();
        return $this->ResponseData(INeedResource::collection($layoutiINeed),'Get All Layouti I Need Operation Success',true,200);

    }
    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Layouti I Need Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $layoutiINeed = $this->layoutiINeed->find($id);
                    if ($layoutiINeed != null ) {
                        $layoutiINeed->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Layouti I Need Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('titleEn','titleAr'),$this->addRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Add Layouti I Need Operation Failed',false,400,$validator->errors());
        }

        $order = $this->layoutiINeed->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1;
        }else{
            $order = 1;
        }
        $this->layoutiINeed->create([
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Layouti I Need Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('id','titleEn','titleAr'),$this->updateRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti I Need Operation Failed',false,400,$validator->errors());
        }
        $layoutiINeed = $this->layoutiINeed->find($request->id);
        if(!$layoutiINeed){
            return $this->ResponseData(null,'Layouti I Need Not Found',false,400);
        }
        $request->titleEn == null ? $titleEn = $layoutiINeed->titleEn : $titleEn = $request->titleEn;
        $request->titleAr == null ? $titleAr = $layoutiINeed->titleAr : $titleAr = $request->titleAr;

        $layoutiINeed->update([
            'titleEn' => $titleEn,
            'titleAr' => $titleAr,
        ]);
        return $this->ResponseData(null,'Update Layouti I Need Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti I Need Operation Failed',false,400,$validator->errors());
        }
        $layoutiINeed = $this->layoutiINeed->find($request->id);
        if(!$layoutiINeed){
            return $this->ResponseData(null,'Layouti I Need Not Found',false,400);
        }

        $layoutiINeed->Delete();
        return $this->ResponseData(null,'Delete Layouti I Need Operation Success',true,200);

    }
}
