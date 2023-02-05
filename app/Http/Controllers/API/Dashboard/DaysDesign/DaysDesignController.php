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


class DaysDesignController extends Controller
{
    use Response , Pagination;

    public $designHeaderContent;
    public $designproductsStatic;
    public $designLinks;
    public $designProject;

    public function __construct()
    {

        $this->designHeaderContent = new DesignHeaderContent();
        $this->designproductsStatic = new DesignproductsStatic();
        $this->designLinks = new DesignLinks();
        $this->designProject = new DesignProject();
        $this->DesignCategory = new DesignCategory();

    }
    public function index()
    {
        $data = [
            'DesignHeaderContent' => new DesignHeaderContentResource($this->designHeaderContent->first()??''),
            'DesignProductsStatic' => new DesignDesignProductsStaticResource($this->designproductsStatic->first()??''),
            'DesignLinks' => new DesignLinksResource($this->designLinks->first()??''),
            'DesignProject' => DesignProjectResource::collection($this->designProject->latest()->take(6)->get()),

        ];

        return $this->ResponseData($data,'get 365DDesign Home Page Data Success',true,200);
    }

    public function projects()
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
        

        $skip = $perPage * ($page-1);
        if ($search != null) {
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
        } else {
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
        $custom = [
            'previous' => new DesignProjectResource($this->designProject->where('id', '<', $this->designProject->id)->orderBy('id','asc')->first()),
            'next' => new DesignProjectResource($this->designProject->where('id', '>', $this->designProject->id)->orderBy('id','asc')->first())  
        ];
        $data = [
            "projcts" => new DesignProjectResource($designProject),
            'custom' =>$custom,
            'related_projcts' =>DesignProjectResource::collection($this->designProject->where('id','!=',$designProject->id)->where('category','!=',$designProject->category)->latest()->take(3)->get())
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


}
