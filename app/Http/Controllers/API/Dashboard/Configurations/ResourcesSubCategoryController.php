<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\ResourcesSubCategoryResource;
use App\Http\Traits\Response;
use App\Models\Configurations\ResourcesCategory;
use App\Models\Configurations\ResourcesSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourcesSubCategoryController extends Controller
{
    use Response;

    public $resourcesSubCategory;
    public $resourcesCategory;

    public function __construct()
    {
        $this->resourcesSubCategory = new ResourcesSubCategory();
        $this->resourcesCategory = new ResourcesCategory();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $resourcesSubCategory = $this->resourcesSubCategory->orderBy('order','ASC')->get();
        return $this->ResponseData(ResourcesSubCategoryResource::collection($resourcesSubCategory),'Get All Resouces Sub Categories Operation Success',true,200);

    }

    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Resouces Sub Categories Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $resourcesSubCategory = $this->resourcesSubCategory->find($id);
                    if ($resourcesSubCategory != null ) {
                        $resourcesSubCategory->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Resouces Sub Categories Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('image','nameEn','nameAr','descriptionEn','descriptionAr','category'),[
            'image' => 'required|image',
            'nameEn' => 'required',
            'nameAr'  => 'required',
            'descriptionEn'  => 'required',
            'descriptionAr'  => 'required',
            'category' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Resouces Sub Category Operation Failed',false,400,$validator->errors());
        }

        $resourcesCategory = $this->resourcesCategory->find($request->category);
        if(!$resourcesCategory){
            return $this->ResponseData(null,'Resources Category Not Found',false,400);
        }


        $imageName = null;
        if(is_file($request->image)){
            $imageName = 'media/ResourcesSubCategories/'.time().'-'.$request->image->getClientOriginalName();
            $request->image->move('media/ResourcesSubCategories',$imageName);
        }

        $order = $this->resourcesSubCategory->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1;
        }else{
            $order = 1;
        }
        $this->resourcesSubCategory->create([
            'image' => $imageName,
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr,
            'descriptionEn' => $request->descriptionEn,
            'descriptionAr' => $request->descriptionAr,
            'category' => $request->category,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Resources Sub Category Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('image','nameEn','nameAr','descriptionEn','descriptionAr','category'),[
            'image' => 'nullable',
            'nameEn' => 'required',
            'nameAr'  => 'required',
            'descriptionEn'  => 'required',
            'descriptionAr'  => 'required',
            'category' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Update Sub Resources Category Operation Failed',false,400,$validator->errors());
        }
        $resourcesSubCategory = $this->resourcesSubCategory->find($request->id);
        if(!$resourcesSubCategory){
            return $this->ResponseData(null,'Resources Sub Category Not Found',false,400);
        }

        $resourcesCategory = $this->resourcesCategory->find($request->category);
        if(!$resourcesCategory){
            return $this->ResponseData(null,'Resources Category Not Found',false,400);
        }

        $imageName = $resourcesSubCategory->image;
        if(is_file($request->image)){
            if($resourcesSubCategory->image != null){
                unlink($resourcesSubCategory->image);
            }
            $imageName = 'media/ResourcesSubCategories/'.time().'-'.$request->image->getClientOriginalName();
            $request->image->move('media/ResourcesSubCategories',$imageName);
        }
        

        $resourcesSubCategory->update([
            'image' => $imageName,
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr,
            'descriptionEn' => $request->descriptionEn,
            'descriptionAr' => $request->descriptionAr,
            'category' => $request->category
        ]);
        return $this->ResponseData(null,'Update Sub Resources Category Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Sub Resources Category Operation Failed',false,400,$validator->errors());
        }
        $resourcesSubCategory = $this->resourcesSubCategory->find($request->id);
        if(!$resourcesSubCategory){
            return $this->ResponseData(null,'Resources Sub Category Not Found',false,400);
        }

        if($resourcesSubCategory->image != null){
            unlink($resourcesSubCategory->image);
        }

        $resourcesSubCategory->Delete();
        return $this->ResponseData(null,'Delete Resources Sub Category Operation Success',true,200);

    }
}
