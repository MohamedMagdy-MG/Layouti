<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiCategories;
use App\Models\ProductPage\ProductCategory;
use App\Models\ProductPage\ProductGeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralInformationController extends Controller
{
    use Response;

    public $layoutiCategories;
    public $productGeneralInformation;
    public $productCategory;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->layoutiCategories = new LayoutiCategories();
        $this->productCategory = new ProductCategory();

    }

   
    public function showProduct(Request $request)
    {
        $validator = Validator::make($request->only('id','status'),[
            'id' => 'required',
            'status' => 'required|boolean'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Show Layouti Project Operation Failed',false,400,$validator->errors());
        }
        $productGeneralInformation = $this->productGeneralInformation->find($request->id);
        if(!$productGeneralInformation){
            return $this->ResponseData(null,'Layouti Project Not Found',false,400);
        }

        
        $status = $request->status;

        $productGeneralInformation->update([
            'status' => $status
        ]);

        return $this->ResponseData(null,'Show Layouti Project Operation Success',true,200);
    }
    

    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->key);
        
        if($productGeneralInformation != null ){

            $DBProductsCategory = $this->productCategory->where('project',$productGeneralInformation)->get();
            foreach ($DBProductsCategory as $DBProductCategory) {
                $DBProductCategory->delete();
            }


            if($request->image == "null"){
                $imageName = null;
                if($productGeneralInformation->image != null){
                    unlink($productGeneralInformation->image);
                }

            }else{
                $imageName = $productGeneralInformation->image;
                if(is_file($request->image)){
                    if($productGeneralInformation->image != null){
                        unlink($productGeneralInformation->image);
                    }
                    $imageName = 'media/ProductPage/GeneralInformation/'.time().'-image-'.$request->image->getClientOriginalName();
                    $request->image->move('media/ProductPage/GeneralInformation',$imageName);
                }
            }

            if($request->thumbnailImage == "null"){
                $thumbnailImageName = null;
                if($productGeneralInformation->thumbnailImage != null){
                    unlink($productGeneralInformation->thumbnailImage);
                }

            }else{
                $thumbnailImageName  = $productGeneralInformation->thumbnailImage;
                if(is_file($request->thumbnailImage)){
                    if($productGeneralInformation->thumbnailImage != null){
                        unlink($productGeneralInformation->thumbnailImage);
                    }
                    $thumbnailImageName = 'media/ProductPage/GeneralInformation/'.time().'-thumbnailImage-'.$request->thumbnailImage->getClientOriginalName();
                    $request->thumbnailImage->move('media/ProductPage/GeneralInformation',$thumbnailImageName);
                }
                
            }
            
            $request->launch == "null" ?  $launch = null : $launch = $request->launch;
            $request->color == "null" ?  $color = null : $color = $request->color;

            $productGeneralInformation->update([
                'template'=> $request->template,
                'launch' => $launch,
                'image'=> $imageName,
                'thumbnailImage' => $thumbnailImageName,
                'color' => $color,
            ]);

            $deletedCategories =$this->productCategory->where('project',$productGeneralInformation->id)->get();
            foreach ($deletedCategories as $deletedCategory) {
                $deletedCategory->delete();
            }


            $categories_count   = count($request->categories);
            $categories  = $request->categories;
            if($categories_count > 0){
                foreach($categories as $category){
                    $findCategory =$this->layoutiCategories->where('id',$category['category'])->first();
                    if($findCategory){
                        $this->productCategory->create([
                            'project' => $productGeneralInformation->id,
                            'category' => $category['category']
                        ]);
                    }
                }
            }
        }else{

            
            $order = $this->productGeneralInformation->orderBy('order','DESC')->first();
            if($order != null ){
                $order = $order->order +1;
            }else{
                $order = 1;
            }

            $imageName = null;
            $thumbnailImageName  = null;


            if(is_file($request->image)){

                $imageName = 'media/ProductPage/GeneralInformation/'.time().'-image-'.$request->image->getClientOriginalName();
                $request->image->move('media/ProductPage/GeneralInformation',$imageName);
            }

            if(is_file($request->thumbnailImage)){
                $thumbnailImageName = 'media/ProductPage/GeneralInformation/'.time().'-thumbnailImage-'.$request->thumbnailImage->getClientOriginalName();
                $request->thumbnailImage->move('media/ProductPage/GeneralInformation',$thumbnailImageName);
            }

            $request->launch == "null" ?  $launch = null : $launch = $request->launch;
            $request->color == "null" ?  $color = null : $color = $request->color;
            

            $productGeneralInformation = $this->productGeneralInformation->create([
                'template'=> $request->template,
                'launch' => $launch,
                'image'=> $imageName,
                'thumbnailImage' => $thumbnailImageName,
                'color' => $color,
            ]);

            $deletedCategories =$this->productCategory->where('project',$productGeneralInformation->id)->get();
            foreach ($deletedCategories as $deletedCategory) {
                $deletedCategory->delete();
            }

            $categories_count   = count($request->categories);
            $categories  = $request->categories;
            if($categories_count > 0){
                foreach($categories as $category){
                    $findCategory =$this->layoutiCategories->where('id',$category['category'])->first();
                    if($findCategory){
                        $this->productCategory->create([
                            'project' => $productGeneralInformation->id,
                            'category' => $category['category']
                        ]);
                    }
                }
            }
        }

        return $this->ResponseData(['PID' => $productGeneralInformation->id],'Save General Information Operation Success',true,200);


    }
}
