<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DaysDesign\DesignDesignProductsStaticResource;
use App\Http\Resources\Dashboard\DaysDesign\DesignHeaderContentResource;
use App\Http\Resources\Dashboard\DaysDesign\DesignLinksResource;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignHeaderContent;
use App\Models\DaysDesign\DesignLinks;
use App\Models\DaysDesign\DesignproductsStatic;

class HomeController extends Controller
{
    use Response;

    public $designHeaderContent;
    public $designproductsStatic;
    public $designLinks;

    public function __construct()
    {

        $this->designHeaderContent = new DesignHeaderContent();
        $this->designproductsStatic = new DesignproductsStatic();
        $this->designLinks = new DesignLinks();

        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'DesignHeaderContent' => new DesignHeaderContentResource($this->designHeaderContent->first()??''),
            'DesignProductsStatic' => new DesignDesignProductsStaticResource($this->designproductsStatic->first()??''),
            'DesignLinks' => new DesignLinksResource($this->designLinks->first()??''),

        ];

        return $this->ResponseData($data,'get 365Design Home Page Data Success',true,200);
    }
}
