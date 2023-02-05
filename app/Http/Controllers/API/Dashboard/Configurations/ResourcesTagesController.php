<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\ResourcesTagesResource;
use App\Http\Traits\Response;
use App\Models\Configurations\ResourcesTages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourcesTagesController extends Controller
{
    use Response;

    public $resourcesTages;

    public function __construct()
    {
        $this->resourcesTages = new ResourcesTages();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $resourcesTages = $this->resourcesTages->orderBy('order','ASC')->get();
        return $this->ResponseData(ResourcesTagesResource::collection($resourcesTages),'Get All Resouces Tags Operation Success',true,200);

    }

    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Resouces Tags Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $resourcesTages = $this->resourcesTages->find($id);
                    if ($resourcesTages != null ) {
                        $resourcesTages->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Resouces Tages Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('color','titleEn','titleAr'),[
            'color' => 'required',
            'titleEn'  => 'required',
            'titleAr'  => 'required',
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Resouces Tag Operation Failed',false,400,$validator->errors());
        }
        $order = $this->resourcesTages->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1;
        }else{
            $order = 1;
        }

        
        $this->resourcesTages->create([
            'color' => $request->color,
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Resources Tag Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('id','color','titleEn','titleAr'),[
            'id' => 'required',
            'color' => 'required',
            'titleEn'  => 'required',
            'titleAr'  => 'required',
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Update Resources Tag Operation Failed',false,400,$validator->errors());
        }
        $resourcesTages = $this->resourcesTages->find($request->id);
        if(!$resourcesTages){
            return $this->ResponseData(null,'Resources Tag Not Found',false,400);
        }

        
        

        $resourcesTages->update([
            'color' => $request->color,
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
        ]);
        return $this->ResponseData(null,'Update Resources Tag Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Resources Tag Operation Failed',false,400,$validator->errors());
        }
        $resourcesTages = $this->resourcesTages->find($request->id);
        if(!$resourcesTages){
            return $this->ResponseData(null,'Resources Tag Not Found',false,400);
        }

        
        
        $resourcesTages->Delete();
        return $this->ResponseData(null,'Delete Resources Tag Operation Success',true,200);

    }
}
