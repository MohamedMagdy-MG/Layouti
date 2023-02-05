<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\DaysDesign\DesignCategoryResource;
use App\Http\Resources\Frontend\DaysDesign\DesignDesignProductsStaticResource;
use App\Http\Resources\Frontend\DaysDesign\DesignHeaderContentResource;
use App\Http\Resources\Frontend\DaysDesign\DesignLinksResource;
use App\Http\Resources\Frontend\DaysDesign\DesignProjectResource;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignCategory;
use App\Models\DaysDesign\DesignHeaderContent;
use App\Models\DaysDesign\DesignLinks;
use App\Models\DaysDesign\DesignproductsStatic;
use App\Models\DaysDesign\DesignProject;
use App\Http\Traits\Pagination;
use App\Models\DaysDesign\DesignProjectClicks;
use App\Models\DaysDesign\DesignProjectDownloads;
use App\Models\DaysDesign\DesignProjectLikes;
use App\Models\DaysDesign\DesignProjectViewers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DaysDesignController extends Controller
{
    use Response , Pagination;

    public $designHeaderContent;
    public $designproductsStatic;
    public $designLinks;
    public $designProject;
    public $DesignCategory;
    public $designProjectLikes;
    public $vesignProjectViewers;
    public $designProjectClicks;
    public $designProjectDownloads;

    public function __construct()
    {

        $this->designHeaderContent = new DesignHeaderContent();
        $this->designproductsStatic = new DesignproductsStatic();
        $this->designLinks = new DesignLinks();
        $this->designProject = new DesignProject();
        $this->DesignCategory = new DesignCategory();
        $this->designProjectLikes = new DesignProjectLikes();
        $this->vesignProjectViewers = new DesignProjectViewers();
        $this->designProjectClicks = new DesignProjectClicks();
        $this->designProjectDownloads = new DesignProjectDownloads();



    }
    public function index()
    {
        $data = [
            'DesignHeaderContent' => new DesignHeaderContentResource($this->designHeaderContent->first()??''),
            'DesignProductsStatic' => new DesignDesignProductsStaticResource($this->designproductsStatic->first()??''),
            'DesignLinks' => new DesignLinksResource($this->designLinks->first()??''),
            'DesignProject' => DesignProjectResource::collection($this->designProject->latest()->take(6)->get()),
            'categories' => DesignCategoryResource::collection($this->DesignCategory->get())

        ];

        return $this->ResponseData($data,'get 365DDesign Home Page Data Success',true,200);
    }

    public function staticProducts()
    {
        $object = $this->designproductsStatic->first();

        $object != null ? $data = new DesignDesignProductsStaticResource($object) : $data = null;
        return $this->ResponseData($data,'get 365DDesign Stativ Projects Data Success',true,200); 
    }

    public function projects()
    {
        $perPage  = 10;
        $page = 1;
        $search = null;
        $category = null;
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


        $skip = $perPage * ($page-1);
        if($category != null){
            $query = $this->designProject->where('category', $category );
        }
        elseif ($search != null) {
            $query = $this->designProject
                ->orWhere('nameEn', 'LIKE', '%' . $search . '%')
                ->orWhere('nameAr', 'LIKE', '%' . $search . '%')
                ->orWhere('ceatedByEn', 'LIKE', '%' . $search . '%')
                ->orWhere('ceatedByAr', 'LIKE', '%' . $search . '%')
                ->orWhere('availabilityProgramsEn', 'LIKE', '%' . $search . '%')
                ->orWhere('availabilityProgramsAr', 'LIKE', '%' . $search . '%')
                ->orWhere('smallDescriptionEn', 'LIKE', '%' . $search . '%')
                ->orWhere('smallDescriptionAr', 'LIKE', '%' . $search . '%')
                ->orWhere('date', 'LIKE', '%' . $search . '%')
                ->orWhere('state', 'LIKE', '%' . $search . '%')
                ->orWhere('price', 'LIKE', '%' . $search . '%')
                ->orWhere('link', 'LIKE', '%' . $search . '%')
                ->orWhere('category', 'LIKE', '%' . $search . '%');
        } 
        elseif( $category != null){
            $DesignCategory = $this->DesignCategory->where('titleEn',$category)->orWhere('titleAr',$category)->first();
            if($DesignCategory != null){
                $query = $this->designProject->where('category', $DesignCategory->id);

            }else{
                $query = $this->designProject;
            }
        }
        else {
            $query = $this->designProject;

        }

        $designProject = $query->latest()->take($perPage)->skip($skip)->get();
        $designProject_count = $query->count();

        $data = [
            "projcts" => DesignProjectResource::collection($designProject),
            'pagination' => $this->paginate($designProject_count,$perPage,$skip,$page,route('frontend.projects'))
        ];
        return $this->ResponseData($data, 'Get All 365Design Projects Operation Success',true, 200);
    }

    public function find()
    {
        $search = null;
        
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }
        if($search == null){
            return $this->ResponseData(null, 'Get 365Design Project Operation Failed',true, 400);

        }
        
        $designProject = $this->designProject->where('nameEn', 'LIKE', '%' . $search . '%')->orWhere('nameAr', 'LIKE', '%' . $search . '%')->first();
        
        if($designProject == null){
            return $this->ResponseData(null, 'Get 365Design Project Operation Failed',true, 400);

        }

        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';

        if($language == 'ar'){
            $prevObject =  $this->designProject->where('id','>',$designProject->id)->orderBy('id','asc')->first() ;
            $prevObject != null ? $prev = $prevObject->nameAr : $prev = null;
            $nextObject = $this->designProject->where('id','<',$designProject->id)->latest()->first();
            $nextObject != null ? $next = $nextObject->nameAr : $next = null ;
        }else{
            $prevObject =  $this->designProject->where('id','>',$designProject->id)->orderBy('id','asc')->first();
            $prevObject != null ? $prev =$prevObject->nameEn : $prev = null;
            $nextObject = $this->designProject->where('id','<',$designProject->id)->latest()->first();
            $nextObject != null ? $next = $nextObject->nameEn : $next = null ;
        }

        $ip = request()->ip();

        $this->vesignProjectViewers->create([
            'ip' => $ip,
            'project' => $designProject->id
        ]);
        
        
        $data = [
            "projcts" => new DesignProjectResource($designProject),
            'related_projcts' =>DesignProjectResource::collection($this->designProject->where('id','!=',$designProject->id)->where('category',$designProject->category)->latest()->take(3)->get()),
            'next' => $next,
            'prev' => $prev
        ];
        return $this->ResponseData($data, 'Get All 365Design Projects Operation Success',true, 200);
    }

    public function links()
    {
        return $this->ResponseData(new DesignLinksResource($this->designLinks->first()??''), 'Get All 365Design links Operation Success',true, 200);
    }

    public function categories()
    {
        $DesignCategory = $this->DesignCategory->get();
        return $this->ResponseData(DesignCategoryResource::collection($DesignCategory),'Get All 365Design Categories Operation Success',true,200);

    }

    public function likes(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Send Project Like Operation Failed',false,400,$validator->errors());
        }


        $ip = $request->ip();
        $designProjectLikes = $this->designProjectLikes->where('ip',$ip)->where('project',$request->id)->first();
        if($designProjectLikes == null){
            $this->designProjectLikes->create([
                'ip' => $ip,
                'project' => $request->id
            ]);
        }
        else{
            $designProjectLikes->delete();
        }
        return $this->ResponseData(null,'Send Project Like Operation Success',true,200);

    }

    public function Click(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Send Project Click Operation Failed',false,400,$validator->errors());
        }


        $designProjectClicks = $this->designProjectClicks->where('project',$request->id)->first();
        if($designProjectClicks == null){
            $count = 1;
            $this->designProjectClicks->create([
                'count' => $count,
                'project' => $request->id
            ]);
        }else{
            $count = $designProjectClicks->count +1;
            $designProjectClicks->update([
                'count' => $count,
            ]);
        }
        
        return $this->ResponseData(null,'Send Project Click Operation Success',true,200);

    }

    public function Download(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Send Project Click Operation Failed',false,400,$validator->errors());
        }


        $ip = $request->ip();
        $designProjectDownloads = $this->designProjectDownloads->where('ip',$ip)->where('project',$request->id)->first();
        if($designProjectDownloads == null){
            $this->designProjectDownloads->create([
                'ip' => $ip,
                'project' => $request->id
            ]);
        }
        
        return $this->ResponseData(null,'Send Project Click Operation Success',true,200);

    }


}
