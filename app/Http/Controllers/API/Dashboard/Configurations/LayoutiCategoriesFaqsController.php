<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Models\Configurations\LayoutiCategoriesFaqs;
use App\Http\Resources\Dashboard\Configurations\LayoutiCategoriesFaqsResource;
use App\Http\Requests\Dashboard\Configurations\LayoutiCategoriesFaqs\AddRequest;
use App\Http\Requests\Dashboard\Configurations\LayoutiCategoriesFaqs\UpdateRequest;
use App\Http\Requests\Dashboard\Configurations\LayoutiCategoriesFaqs\DeleteRequest;

use App\Http\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LayoutiCategoriesFaqsController extends Controller
{
    use Response;

    public $layoutiCategories;
    public $addRequest;
    public $updateRequest;
    public $deleteRequest;

    public function __construct()
    {
        $this->layoutiCategories = new LayoutiCategoriesFaqs();
        $this->addRequest = new AddRequest();
        $this->updateRequest = new UpdateRequest();
        $this->deleteRequest = new DeleteRequest();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $layoutiCategories = $this->layoutiCategories->orderBy('order','ASC')->get();
        return $this->ResponseData(LayoutiCategoriesFaqsResource::collection($layoutiCategories),'Get All Layouti Categories Faqs Operation Success',true,200);

    }
    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Layouti Services Categories Faqs Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $layoutiCategories = $this->layoutiCategories->find($id);
                    if ($layoutiCategories != null ) {
                        $layoutiCategories->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order+1 ;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Layouti Services Categories Faqs Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('nameEn','nameAr'),$this->addRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Add Layouti Category Faqs Operation Failed',false,400,$validator->errors());
        }
        $order = $this->layoutiCategories->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1;
        }else{
            $order = 1;
        }
        $this->layoutiCategories->create([
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Layouti Category Faqs Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('id','nameEn','nameAr'),$this->updateRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti Category Faqs Operation Failed',false,400,$validator->errors());
        }
        $layoutiCategories = $this->layoutiCategories->find($request->id);
        if(!$layoutiCategories){
            return $this->ResponseData(null,'Layouti Category Faqs Not Found',false,400);
        }
        $request->nameEn == null ? $nameEn = $layoutiCategories->nameEn : $nameEn = $request->nameEn;
        $request->nameAr == null ? $nameAr = $layoutiCategories->nameAr : $nameAr = $request->nameAr;

        $layoutiCategories->update([
            'nameEn' => $nameEn,
            'nameAr' => $nameAr,
        ]);
        return $this->ResponseData(null,'Update Layouti Category Faqs Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti Category Faqs Operation Failed',false,400,$validator->errors());
        }
        $layoutiCategories = $this->layoutiCategories->find($request->id);
        if(!$layoutiCategories){
            return $this->ResponseData(null,'Layouti Category Faqs Not Found',false,400);
        }

        $layoutiCategories->Delete();
        return $this->ResponseData(null,'Delete Layouti Category Faqs Operation Success',true,200);

    }
}
