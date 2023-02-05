<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DaysDesign\DesignCategoryResource;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignCategoryController extends Controller
{
    use Response;

    public $DesignCategory;

    public function __construct()
    {
        $this->DesignCategory = new DesignCategory();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $DesignCategory = $this->DesignCategory->orderBy('order','ASC')->get();
        return $this->ResponseData(DesignCategoryResource::collection($DesignCategory),'Get All 365Design Categories Operation Success',true,200);

    }

    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All 365Design Categories Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $DesignCategory = $this->DesignCategory->find($id);
                    if ($DesignCategory != null ) {
                        $DesignCategory->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All 365Design Categories Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {

        $imageName = null;
        if(is_file($request->image)){
            $imageName = 'media/365Design/Category/'.time().'-'.$request->image->getClientOriginalName();
            $request->image->move('media/365Design/Category',$imageName);
        }

        $coverImageName = null;
        if(is_file($request->coverImage)){
            $coverImageName = 'media/365Design/Category/'.time().'-cover-'.$request->coverImage->getClientOriginalName();
            $request->coverImage->move('media/365Design/Category',$coverImageName);
        }


        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 

        
        $order = $this->DesignCategory->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1 ;
        }else{
            $order = 1;
        }
       
        $this->DesignCategory->create([
            'titleEn' => $titleEn,
            'titleAr' => $titleAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
            'image' => $imageName,
            'coverImage' => $coverImageName,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add 365Design Category Operation Success',false,200);

    }

    public function Update(Request $request)
    {

        $DesignCategory = $this->DesignCategory->find($request->id);
        if(!$DesignCategory){
            return $this->ResponseData(null,'365Design Category Not Found',false,400);
        }

        if($request->image != null){
            $imageName = $DesignCategory->image;
            if(is_file($request->image)){
                if($DesignCategory->image){
                    unlink($imageName);
                }
                $imageName = 'media/365Design/Category/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/Category',$imageName);
            }
        }
        else{
            $imageName = null;
            if($DesignCategory->image){
                unlink($DesignCategory->image);
            }
        }

        if($request->coverImage != null){
            $coverImageName = $DesignCategory->coverImage;
            if(is_file($request->coverImage)){
                if($DesignCategory->coverImage){
                    unlink($coverImageName);
                }
                $coverImageName = 'media/365Design/Category/'.time().'-cover-'.$request->coverImage->getClientOriginalName();
                $request->coverImage->move('media/365Design/Category',$coverImageName);
            }
        }else{
            $coverImageName = null;
            if($DesignCategory->coverImage){
                unlink($DesignCategory->coverImage);
            }
        }

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 

        $DesignCategory->update([
            'titleEn' => $titleEn,
            'titleAr' => $titleAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
            'image' => $imageName,
            'coverImage' => $coverImageName,
        ]);
        return $this->ResponseData(null,'Update 365Design Category Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete 365Design Category Operation Failed',false,400,$validator->errors());
        }
        $DesignCategory = $this->DesignCategory->find($request->id);
        if(!$DesignCategory){
            return $this->ResponseData(null,'365Design Category Not Found',false,400);
        }

        if($DesignCategory->image){
            unlink($DesignCategory->image);
        }
        if($DesignCategory->coverImage){
            unlink($DesignCategory->coverImage);
        }
        


        $DesignCategory->Delete();
        return $this->ResponseData(null,'Delete 365Design Category Operation Success',true,200);

    }
}
