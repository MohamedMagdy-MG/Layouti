<?php

namespace App\Http\Controllers\API\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Blog\BlogCategoryResource;
use App\Http\Traits\Response;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    use Response;

    public $blogCategory;

    public function __construct()
    {
        $this->blogCategory = new BlogCategory();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $blogCategory = $this->blogCategory->orderBy('order','ASC')->get();
        return $this->ResponseData(BlogCategoryResource::collection($blogCategory),'Get All Blog Categories Operation Success',true,200);

    }
    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update Get All Blog Categories Arrange Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $blogCategory = $this->blogCategory->find($id);
                    if ($blogCategory != null ) {
                        $blogCategory->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update Get All Blog Categories Arrange Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $request->nameEn == "null" ? $nameEn = null : $nameEn = $request->nameEn;
        $request->nameAr == "null" ? $nameAr = null : $nameAr = $request->nameAr;


        $order = $this->blogCategory->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1;
        }else{
            $order = 1;
        }
        $this->blogCategory->create([
            'nameEn' => $nameEn,
            'nameAr' => $nameAr,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Blog Category Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $blogCategory = $this->blogCategory->find($request->id);
        if(!$blogCategory){
            return $this->ResponseData(null,'Blog Category Not Found',false,400);
        }

        $request->nameEn == "null" ? $nameEn = null : $nameEn = $request->nameEn;
        $request->nameAr == "null" ? $nameAr = null : $nameAr = $request->nameAr;

        $blogCategory->update([
            'nameEn' => $nameEn,
            'nameAr' => $nameAr,
        ]);
        return $this->ResponseData(null,'Update Blog Category Operation Success',true,200);

    }

    public function Delete(Request $request)
    {

        $blogCategory = $this->blogCategory->find($request->id);
        if(!$blogCategory){
            return $this->ResponseData(null,'Blog Category Not Found',false,400);
        }

        $blogCategory->Delete();
        return $this->ResponseData(null,'Delete Blog Category Operation Success',true,200);

    }
}
