<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RequestResourceRequest;
use App\Http\Resources\Frontend\Resources\ResourcesCategoryResource;
use App\Http\Resources\Frontend\Resources\ResourcesCustomCategoryResource;
use App\Http\Resources\Frontend\Resources\ResourcesCustomSubCategoryResource;
use App\Http\Resources\Frontend\Resources\ResourcesFooterContentResource;
use App\Http\Resources\Frontend\Resources\ResourcesHeaderContentResource;
use App\Http\Traits\Response;
use App\Models\Configurations\ResourcesCategory;
use App\Models\Configurations\ResourcesSubCategory;
use App\Models\Configurations\ResourcesSubCategoryViewers;
use App\Models\Resources\ResourcesFooterContent;
use App\Models\Resources\ResourcesHeaderContent;
use App\Models\Resources\ResourcesInnerPage;
use App\Models\Resources\ResourcesInnerPageClicks;
use App\Models\Resources\ResourcesInnerPageDownloads;
use App\Models\Resources\ResourcesInnerPageLikes;
use App\Models\Resources\ResourcesInnerPagePending;
use App\Models\Resources\ResourcesInnerPageViewers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourcesController extends Controller
{
    use Response;

    public $resourcesHeaderContent;
    public $resourcesCategory;
    public $resourcesSubCategory;
    public $resourcesInnerPage;
    public $resourcesSubCategoryViewers;
    public $resourcesInnerPageClicks;
    public $resourcesInnerPageDownloads;
    public $resourcesInnerPagePending;
    public $requestResourceRequest;
    public $resourcesInnerPageLikes;
    public $resourcesInnerPageViewers;
    public $resourcesFooterContent;


    public function __construct()
    {
        $this->resourcesHeaderContent = new ResourcesHeaderContent();
        $this->resourcesFooterContent = new ResourcesFooterContent();
        $this->resourcesCategory = new ResourcesCategory();
        $this->resourcesSubCategory = new ResourcesSubCategory();
        $this->resourcesSubCategoryViewers = new ResourcesSubCategoryViewers();
        $this->resourcesInnerPage = new ResourcesInnerPage();
        $this->resourcesInnerPagePending = new ResourcesInnerPagePending();
        $this->resourcesInnerPageClicks = new ResourcesInnerPageClicks();
        $this->resourcesInnerPageDownloads = new ResourcesInnerPageDownloads();
        $this->resourcesInnerPageLikes = new ResourcesInnerPageLikes();
        $this->resourcesInnerPageViewers = new ResourcesInnerPageViewers();
        $this->requestResourceRequest = new RequestResourceRequest();
    }

    public function index()
    {
        $data = [
            'headerContent' => new ResourcesHeaderContentResource($this->resourcesHeaderContent->first()??''),
            'footerContent' => new ResourcesFooterContentResource($this->resourcesFooterContent->first()??''),
            'categories' => ResourcesCategoryResource::collection($this->resourcesCategory->orderBy('order','asc')->latest()->get())
        ];
        return $this->ResponseData($data,'Get Resources Page Data Operation Success',true,200);

    }

    public function category()
    {

        $search = null;
        $status = null;
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }
        if(array_key_exists('status',$_GET)){
            $status = $_GET['status'];
        }


        if($search == null){
            return $this->ResponseData(null, 'Get Category Data Operation Failed',true, 400);

        }

        if($status == "category"){
            $resourcesCategory = $this->resourcesCategory->where('nameEn', 'LIKE', '%' . $search . '%')->orWhere('nameAr', 'LIKE', '%' . $search . '%')->first();
        
            if(!$resourcesCategory){
                return $this->ResponseData(null, 'Get Category Data Operation Failed',true, 400);
            }

            return $this->ResponseData(new ResourcesCustomCategoryResource($resourcesCategory), 'Get Category Data Operation Success',true, 200);

        }
        
        else{
            $resourcesSubCategory = $this->resourcesSubCategory->where('nameEn', 'LIKE', '%' . $search . '%')->orWhere('nameAr', 'LIKE', '%' . $search . '%')->first();
        
            if(!$resourcesSubCategory){
                return $this->ResponseData(null, 'Get Category Data Operation Failed',true, 400);
            }
    
    
            $resourcesSubCategoryViewers = $this->resourcesSubCategoryViewers->where('ip',request()->ip())->first();
            if(!$resourcesSubCategoryViewers){
                $this->resourcesSubCategoryViewers->create([
                    'ip' => request()->ip(),
                    'category' => $resourcesSubCategory->id
                ]);
            }
            return $this->ResponseData(new ResourcesCustomSubCategoryResource($resourcesSubCategory), 'Get Category Data Operation Success',true, 200);
        }
       
        

        
    }



    

    public function Click(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Send Inner Click Operation Failed',false,400,$validator->errors());
        }

        $resourcesSubCategory = $this->resourcesSubCategory->where('id',$request->id)->first();
        
        if(!$resourcesSubCategory){
            return $this->ResponseData(null, 'Get Category Data Operation Failed',true, 400);
        }



        $resourcesInnerPageClicks = $this->resourcesInnerPageClicks->where('inner',$request->id)->first();
        if($resourcesInnerPageClicks == null){
            $count = 1;
            $this->resourcesInnerPageClicks->create([
                'count' => $count,
                'inner' => $resourcesSubCategory->id
            ]);
        }else{
            $count = $resourcesInnerPageClicks->count +1;
            $resourcesInnerPageClicks->update([
                'count' => $count,
            ]);
        }
        
        return $this->ResponseData(null,'Send Inner Click Operation Success',true,200);

    }

    public function Download(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Send Inner Download Operation Failed',false,400,$validator->errors());
        }

        $resourcesSubCategory = $this->resourcesSubCategory->where('id',$request->id)->first();
        
        if(!$resourcesSubCategory){
            return $this->ResponseData(null, 'Get Category Data Operation Failed',true, 400);
        }


        $ip = $request->ip();
        $resourcesInnerPageDownloads = $this->resourcesInnerPageDownloads->where('ip',$ip)->where('inner',$request->id)->first();
        if($resourcesInnerPageDownloads == null){
            $this->resourcesInnerPageDownloads->create([
                'ip' => $ip,
                'inner' => $resourcesSubCategory->id
            ]);
        }
        
        return $this->ResponseData(null,'Send Inner Download Operation Success',true,200);

    }

    public function requestResource(Request $request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            $errMessag = "فشلت عملية ارسال طلب المورد";
            $successMessag = "نجحت عملية ارسال طلب المورد";
        }else{
            $errMessag = "Send Request Resource Opreation Failed.";
            $successMessag = "Send Request Resource Opreation Success.";
        }
        $validator = Validator::make($request->only('title','link'),$this->requestResourceRequest->rules(),$this->requestResourceRequest->Message());
        if($validator->fails()){
            return $this->ResponseData(null,$errMessag,false,400,$validator->errors());
        }else{
            $this->resourcesInnerPagePending->create([
                'title'  => $request->title,
                'link' => $request->link,
            ]);

            return $this->ResponseData(null,$successMessag,true,200);

        }

    }

    public function likes(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Send Resource Like Operation Failed',false,400,$validator->errors());
        }


        $ip = $request->ip();
        $resourcesInnerPageLikes = $this->resourcesInnerPageLikes->where('ip',$ip)->where('inner',$request->id)->first();
        if($resourcesInnerPageLikes == null){
            $this->resourcesInnerPageLikes->create([
                'ip' => $ip,
                'inner' => $request->id
            ]);
        }
        else{
            $resourcesInnerPageLikes->delete();
        }
        return $this->ResponseData(null,'Send Resource Like Operation Success',true,200);

    }


}
