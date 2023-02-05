<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\INeedResource;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiINeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class INeedController extends Controller
{
    use Response;

    public $layoutiINeed;

    public function __construct()
    {
        $this->layoutiINeed = new LayoutiINeed();
    }

    public function All()
    {
        $layoutiINeed = $this->layoutiINeed->get();
        return $this->ResponseData(INeedResource::collection($layoutiINeed),'Get All Layouti I Need Operation Success',true,200);

    }





}
