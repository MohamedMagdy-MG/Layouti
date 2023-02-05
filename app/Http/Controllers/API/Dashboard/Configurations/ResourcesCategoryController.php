<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\ResourcesCategoryResource;
use App\Http\Traits\Response;
use App\Models\Configurations\ResourcesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourcesCategoryController extends Controller
{
    use Response;

    public $resourcesCategory;

    public function __construct()
    {
        $this->resourcesCategory = new ResourcesCategory();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $resourcesCategory = $this->resourcesCategory->orderBy('order','ASC')->get();
        return $this->ResponseData(ResourcesCategoryResource::collection($resourcesCategory),'Get All Resouces Categories Operation Success',true,200);

    }

    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Resouces Categories Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $resourcesCategory = $this->resourcesCategory->find($id);
                    if ($resourcesCategory != null ) {
                        $resourcesCategory->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Resouces Categories Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('icon','nameEn','nameAr','descriptionEn','descriptionAr'),[
            'icon' => 'required|image',
            'nameEn' => 'required',
            'nameAr'  => 'required',
            'descriptionEn'  => 'required',
            'descriptionAr'  => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Resouces Category Operation Failed',false,400,$validator->errors());
        }
        $order = $this->resourcesCategory->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1;
        }else{
            $order = 1;
        }

        $iconName = null;
        if(is_file($request->image)){
            $iconName = 'media/ResourcesCategories/'.time().'-'.$request->image->getClientOriginalName();
            $request->image->move('media/ResourcesCategories',$iconName);
        }

        

        $this->resourcesCategory->create([
            'icon' => $iconName,
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr,
            'descriptionEn' => $request->descriptionEn,
            'descriptionAr' => $request->descriptionAr,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Resources Category Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('id','icon','nameEn','nameAr','descriptionEn','descriptionAr'),[
            'id' => 'required',
            'nameEn' => 'required',
            'nameAr'  => 'required',
            'descriptionEn'  => 'required',
            'descriptionAr'  => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Update Resources Category Operation Failed',false,400,$validator->errors());
        }
        $resourcesCategory = $this->resourcesCategory->find($request->id);
        if(!$resourcesCategory){
            return $this->ResponseData(null,'Resources Category Not Found',false,400);
        }

        $iconName = $resourcesCategory->icon;
        if(is_file($request->icon)){
            if($resourcesCategory->icon != null){
                unlink($resourcesCategory->icon);
            }
            $iconName = 'media/ResourcesCategories/'.time().'-'.$request->image->getClientOriginalName();
            $request->image->move('media/ResourcesCategories',$iconName);
        }
        
        

        $resourcesCategory->update([
            'icon' => $iconName,
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr,
            'descriptionEn' => $request->descriptionEn,
            'descriptionAr' => $request->descriptionAr,
        ]);
        return $this->ResponseData(null,'Update Resources Category Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Resources Category Operation Failed',false,400,$validator->errors());
        }
        $resourcesCategory = $this->resourcesCategory->find($request->id);
        if(!$resourcesCategory){
            return $this->ResponseData(null,'Resources Category Not Found',false,400);
        }

        if(count($resourcesCategory->SubCategories) > 0){
            foreach ($resourcesCategory->SubCategories as $resourcesSubCategory) {
                if($resourcesSubCategory){
                    
                    if($resourcesSubCategory->image != null){
                        unlink($resourcesSubCategory->image);
                    }
                }
            }
            
    
            $resourcesSubCategory->Delete();
        }
        if($resourcesCategory->icon != null){
            unlink($resourcesCategory->icon);
        }
        $resourcesCategory->Delete();
        return $this->ResponseData(null,'Delete Resources Category Operation Success',true,200);

    }
}
