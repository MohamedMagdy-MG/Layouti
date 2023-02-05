<?php

namespace App\Http\Controllers\API\Dashboard\Resources;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\NewResourcesCategoryResource;
use App\Http\Resources\Dashboard\Resources\NewResourcesInnerPageResource;
use App\Http\Resources\Dashboard\Resources\resourcesInnerPagePendingResource;
use App\Http\Resources\Dashboard\Resources\ResourcesInnerPageResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\Configurations\ResourcesCategory;
use App\Models\Configurations\ResourcesSubCategory;
use App\Models\Resources\ResourcesInnerPage;
use App\Models\Resources\ResourcesInnerPageCategory;
use App\Models\Resources\ResourcesInnerPagePending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InnerPageController extends Controller
{
    use Response,Pagination;

    public $resourcesInnerPage;
    public $resourcesCategory;
    public $resourcesSubCategory;
    public $resourcesInnerPagePending;
    public $resourcesInnerPageCategory;

    public function __construct()
    {
        $this->resourcesInnerPage = new ResourcesInnerPage();
        $this->resourcesInnerPagePending = new ResourcesInnerPagePending();
        $this->resourcesCategory = new ResourcesCategory();
        $this->resourcesSubCategory = new ResourcesSubCategory();
        $this->resourcesInnerPageCategory = new ResourcesInnerPageCategory();
        $this->middleware('checkAuth');
    }

    public function Categories()
    {
        $resourcesCategory = $this->resourcesCategory->orderBy('order','ASC')->get();
        return $this->ResponseData(NewResourcesCategoryResource::collection($resourcesCategory),'Get All Resouces Categories Operation Success',true,200);

    }

    public function NewCategories()
    {
        
        $resourcesCategory = $this->resourcesCategory->orderBy('order','ASC')->get();

        $data = [];
        foreach ($resourcesCategory as $category) {
            if(count($category->SubCategories) > 0){
                foreach($category->SubCategories as $subCategory){
                    array_push($data,[
                        'id' => $subCategory->id,
                        'nameEn' => $subCategory->nameEn,
                        'nameAr' => $subCategory->nameAr,
                        'status' => 'subCategory',
                    ]);
                }
            }else{
                array_push($data,[
                    'id' => $category->id,
                    'nameEn' => $category->nameEn,
                    'nameAr' => $category->nameAr,
                    'status' => 'category',
                ]);
            }
        }
        return $this->ResponseData($data,'Get All Resouces Categories Operation Success',true,200);

    }

    // public function All()
    // {
    //     $resourcesInnerPage = $this->resourcesInnerPage->get();
    //     return $this->ResponseData(ResourcesInnerPageResource::collection($resourcesInnerPage),'Get All Resources Inner Page Operation Success',true,200);

    // }

    public function All()
    {
        $perPage  = 10;
        $page = 1;
        $search = null;
        $category = null;
        $status = null;
        
        if(array_key_exists('perPage',$_GET)){
            $perPage = $_GET['perPage'];
        }
        if(array_key_exists('page',$_GET)){
            $page = $_GET['page'];
        }
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }
        if(array_key_exists('category',$_GET)){
            $category = $_GET['category'];
        }
        if(array_key_exists('status',$_GET)){
            $status = $_GET['status'];
        }


        if($category != null && $status == "category"){
            $category = $this->resourcesCategory->where('nameEn','LIKE','%'.$category.'%')->first();
            if($category){
                $resourcesInnerPageCategory = $this->resourcesInnerPageCategory->where('category',$category->id)->get();
                $resourcesInnerPageCategoryData = [];
                foreach($resourcesInnerPageCategory as $cc){
                    array_push($resourcesInnerPageCategoryData,$cc->page);
                }
                $query = $this->resourcesInnerPage->whereIn('id',$resourcesInnerPageCategoryData);
            }
            

        }
        elseif($category != null && $status == "subCategory"){
            $category = $this->resourcesSubCategory->where('nameEn','LIKE','%'.$category.'%')->first();
            if($category){
                $resourcesInnerPageCategory = $this->resourcesInnerPageCategory->where('subCategory',$category->id)->get();
                $resourcesInnerPageCategoryData = [];
                foreach($resourcesInnerPageCategory as $cc){
                    array_push($resourcesInnerPageCategoryData,$cc->page);
                }
                $query = $this->resourcesInnerPage->whereIn('id',$resourcesInnerPageCategoryData);
            }
            

        }
        else{
            
            if ($search != null) {
                $query = $this->resourcesInnerPage
                    ->orWhere('titleAr', 'LIKE', '%' . $search . '%')
                    ->orWhere('titleEn', 'LIKE', '%' . $search . '%')
                    ->orWhere('descriptionEn', 'LIKE', '%' . $search . '%')
                    ->orWhere('descriptionAr', 'LIKE', '%' . $search . '%');
            } else {
                $query = $this->resourcesInnerPage;

            }

           
           
        }
        $skip = $perPage * ($page-1);
        $resourcesInnerPage = $query->latest()->take($perPage)->skip($skip)->get();
        $resourcesInnerPage_count = $query->count();

        $data = [
            "pages" => ResourcesInnerPageResource::collection($resourcesInnerPage),
            'pagination' => $this->paginate($resourcesInnerPage_count,$perPage,$skip,$page,route('resources.innerPage.index'))
        ];
        return $this->ResponseData($data, 'Get All Resources Inner Page Operation Success',true, 200);

    }

    public function AllPending()
    {
        $perPage  = 10;
        $page = 1;
        $search = null;
        
        if(array_key_exists('perPage',$_GET)){
            $perPage = $_GET['perPage'];
        }
        if(array_key_exists('page',$_GET)){
            $page = $_GET['page'];
        }
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }
    
            
        if ($search != null) {
            $query = $this->resourcesInnerPagePending
                ->orWhere('title', 'LIKE', '%' . $search . '%')
                ->orWhere('link', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->resourcesInnerPagePending;

        }

           
           
        
        $skip = $perPage * ($page-1);
        $resourcesInnerPagePending = $query->latest()->take($perPage)->skip($skip)->get();
        $resourcesInnerPagePending_count = $query->count();

        $data = [
            "pages" => resourcesInnerPagePendingResource::collection($resourcesInnerPagePending),
            'pagination' => $this->paginate($resourcesInnerPagePending_count,$perPage,$skip,$page,route('resources.innerPage.pending'))
        ];
        return $this->ResponseData($data, 'Get All Resources Inner Pending Page Operation Success',true, 200);

    }

    public function findPending(Request $request)
    {
        $validator = Validator::make($request->only('id'),[
            'id' => 'required',
           
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Find Inner Pending Page Operation Failed',false,400,$validator->errors());
        }
        $resourcesInnerPagePending = $this->resourcesInnerPagePending->find($request->id);
        if(!$resourcesInnerPagePending){
            return $this->ResponseData(null,'Resources Resources Inner Pending Page Not Found',false,400);
        }
        return $this->ResponseData(new resourcesInnerPagePendingResource($resourcesInnerPagePending),'Get All Resources Inner Pending Page Operation Success',true,200);

           

    }
    public function AddPending(Request $request)
    {
        $validator = Validator::make($request->only('id','categories','image','titleEn','titleAr','descriptionEn','descriptionAr','link','file'),[
            'id' =>'required',
            'categories' => 'required|array',
            'categories.*.category' => 'required',
            'categories.*.status' => 'required',
            'image' => 'required|image',
            
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Resources Inner Page Operation Failed',false,400,$validator->errors());
        }

        $findInner = $this->resourcesInnerPage->where('titleEn','LIKE','%'.$request->titleEn.'%')->where('titleAr','LIKE','%'.$request->titleAr.'%')->first();
        if($findInner != null){
            return $this->ResponseData(null,'Add Resources Inner Page Operation Failed Because The Page Added Yet.',false,400,$validator->errors());
        }

        $resourcesInnerPagePending = $this->resourcesInnerPagePending->find($request->id);
        if(!$resourcesInnerPagePending){
            return $this->ResponseData(null,'Resources Resources Inner Pending Page Not Found',false,400);
        }

        


        $imageName = null;
        if(is_file($request->image)){
            $imageName = 'media/Resources/'.time().'-image-'.$request->image->getClientOriginalName();
            $request->image->move('media/Resources',$imageName);
        }

        // $fileName = null;
        // if(is_file($request->file)){
        //     $fileName = 'media/Resources/'.time().'-file-'.$request->file->getClientOriginalName();
        //     $request->file->move('media/Resources',$fileName);
        // }

        
        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn;
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr;
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn;
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr;
        $request->link == "null" ? $link = null : $link = $request->link;
        $request->file == "null" ? $file = null : $file = $request->file;


        if($link != null){
            if(strstr($link,'?')){
                $link = $link;
            }else{
                $link =$link.'/?ref=layouti.com';
            }
       }

       if($file != null){
            if(strstr($file,'?')){
                $file = $file;
            }else{
                $file =$file.'/?ref=layouti.com';
            }
        }



        $resourcesInnerPage = $this->resourcesInnerPage->create([
            'image' => $imageName,
            'titleEn' => $titleEn,
            'titleAr' => $titleAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
            'link' => $link,
            'file' => $file,
        ]);

        $categories = $request->categories;
        if(count($categories) > 0){
            foreach($categories as $category){
                if($category['status'] == "category"){
                    $this->resourcesInnerPageCategory->create([
                        'page'=> $resourcesInnerPage->id,
                        'category' => $category['category'],
                    ]);
                    
                }
                else{
                    $this->resourcesInnerPageCategory->create([
                        'page'=> $resourcesInnerPage->id,
                        'subcategory' => $category['category'],
                    ]);
                }
            }
        } 

        $resourcesInnerPagePending->delete();

        
        return $this->ResponseData(null,'Add Resources Inner Page Operation Success',false,200);

    }

    public function DeletePending(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Resources Inner Pending Page Operation Failed',false,400,$validator->errors());
        }
        $resourcesInnerPagePending = $this->resourcesInnerPagePending->find($request->id);
        if(!$resourcesInnerPagePending){
            return $this->ResponseData(null,'Resources Inner Pending Page Not Found',false,400);
        }

        
        $resourcesInnerPagePending->Delete();
        return $this->ResponseData(null,'Delete Resources Inner Pending Page Operation Success',true,200);

    }


    public function find(Request $request)
    {
        $validator = Validator::make($request->only('id'),[
            'id' => 'required',
           
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Find Inner Page Operation Failed',false,400,$validator->errors());
        }
        $resourcesInnerPage = $this->resourcesInnerPage->find($request->id);
        if(!$resourcesInnerPage){
            return $this->ResponseData(null,'Resources Resources Inner Page Not Found',false,400);
        }
        return $this->ResponseData(new ResourcesInnerPageResource($resourcesInnerPage),'Get All Resources Inner Page Operation Success',true,200);

    }

    
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('categories','image','titleEn','titleAr','descriptionEn','descriptionAr','link','file','color'),[
            'categories' => 'required|array',
            'categories.*.category' => 'required',
            'categories.*.status' => 'required',
            'image' => 'required|image',
            
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Resources Inner Page Operation Failed',false,400,$validator->errors());
        }

        $findInner = $this->resourcesInnerPage->where('titleEn','LIKE','%'.$request->titleEn.'%')->where('titleAr','LIKE','%'.$request->titleAr.'%')->first();
        if($findInner != null){
            return $this->ResponseData(null,'Add Resources Inner Page Operation Failed Because The Page Added Yet.',false,400,$validator->errors());
        }

        


        $imageName = null;
        if(is_file($request->image)){
            $imageName = 'media/Resources/'.time().'-image-'.$request->image->getClientOriginalName();
            $request->image->move('media/Resources',$imageName);
        }

        // $fileName = null;
        // if(is_file($request->file)){
        //     $fileName = 'media/Resources/'.time().'-file-'.$request->file->getClientOriginalName();
        //     $request->file->move('media/Resources',$fileName);
        // }

        
        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn;
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr;
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn;
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr;
        $request->link == "null" ? $link = null : $link = $request->link;
        $request->file == "null" ? $file = null : $file = $request->file;
        $request->color == "null" ? $color = null : $color = $request->color;


        if($link != null){
            if(strstr($link,'?')){
                $link = $link;
            }else{
                $link =$link.'/?ref=layouti.com';
            }
       }

       if($file != null){
            if(strstr($file,'?')){
                $file = $file;
            }else{
                $file =$file.'/?ref=layouti.com';
            }
        }



        $resourcesInnerPage = $this->resourcesInnerPage->create([
            'image' => $imageName,
            'titleEn' => $titleEn,
            'titleAr' => $titleAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
            'link' => $link,
            'file' => $file,
            'color' => $color,
        ]);

        $categories = $request->categories;
        if(count($categories) > 0){
            foreach($categories as $category){
                if($category['status'] == "category"){
                    $this->resourcesInnerPageCategory->create([
                        'page'=> $resourcesInnerPage->id,
                        'category' => $category['category'],
                    ]);
                    
                }
                else{
                    $this->resourcesInnerPageCategory->create([
                        'page'=> $resourcesInnerPage->id,
                        'subcategory' => $category['category'],
                    ]);
                }
            }
        } 

        
        return $this->ResponseData(null,'Add Resources Inner Page Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('id','categories','image','titleEn','titleAr','descriptionEn','descriptionAr','link','file','color'),[
            'id' => 'required',
            'categories' => 'required|array',
            'categories.*.category' => 'required',
            'categories.*.status' => 'required',
            'image' => 'nullable',
            
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Update Sub Resources Inner Page Operation Failed',false,400,$validator->errors());
        }
        $resourcesInnerPage = $this->resourcesInnerPage->find($request->id);
        if(!$resourcesInnerPage){
            return $this->ResponseData(null,'Resources Resources Inner Page Not Found',false,400);
        }
        
       

        if($request->image == "null"){
            $imageName = null;
            if($resourcesInnerPage->image != null){
                unlink($resourcesInnerPage->image);
            }
        }else{
            $imageName = $resourcesInnerPage->image;
            if(is_file($request->image)){
                if($resourcesInnerPage->image != null){
                    unlink($resourcesInnerPage->image);
                }
                $imageName = 'media/Resources/'.time().'-image-'.$request->image->getClientOriginalName();
                $request->image->move('media/Resources',$imageName);
            }

        }

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn;
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr;
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn;
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr;
        $request->link == "null" ? $link = null : $link = $request->link;
        $request->file == "null" ? $file = null : $file = $request->file;
        $request->color == "null" ? $color = null : $color = $request->color;

        
       if($link != null){
            if(strstr($link,'?')){
                $link = $link;
            }else{
                $link =$link.'/?ref=layouti.com';
            }
       }

       if($file != null){
            if(strstr($file,'?')){
                $file = $file;
            }else{
                $file =$file.'/?ref=layouti.com';
            }
        }

        $resourcesInnerPage->update([
            'image' => $imageName,
            'titleEn' => $titleEn,
            'titleAr' => $titleAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
            'link' => $link,
            'file' => $file,
            'color' => $color,
        ]);

        $oldCategories = $this->resourcesInnerPageCategory->where('page',$resourcesInnerPage->id)->get();
        foreach($oldCategories as $category){
            $category->delete();
        }

        $categories = $request->categories;
        if(count($categories) > 0){
            foreach($categories as $category){
                if($category['status'] == "category"){
                    $this->resourcesInnerPageCategory->create([
                        'page'=> $resourcesInnerPage->id,
                        'category' => $category['category'],
                    ]);
                    
                }
                else{
                    $this->resourcesInnerPageCategory->create([
                        'page'=> $resourcesInnerPage->id,
                        'subcategory' => $category['category'],
                    ]);
                }
            }
        } 
        return $this->ResponseData(null,'Update Resources Inner Page Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Resources Inner Page Operation Failed',false,400,$validator->errors());
        }
        $resourcesInnerPage = $this->resourcesInnerPage->find($request->id);
        if(!$resourcesInnerPage){
            return $this->ResponseData(null,'Resources Inner Page Not Found',false,400);
        }

        if($resourcesInnerPage->image != null){
            unlink($resourcesInnerPage->image);
        }

        

        $resourcesInnerPage->Delete();
        return $this->ResponseData(null,'Delete Resources Inner Page Operation Success',true,200);

    }
}
