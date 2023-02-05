<?php

namespace App\Http\Controllers\API\Dashboard\WorkPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\WorkPage\WorkHeaderContentResource;
use App\Http\Resources\Dashboard\WorkPage\WorkWorkWeFiredUpInnovatedResource;
use App\Http\Traits\Response;
use App\Models\WorkPage\WorkHeaderContent;
use App\Models\WorkPage\WorkWeFiredUpInnovated;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Response;

    public $workHeaderContent;
    public $workWeFiredUpInnovated;

    public function __construct()
    {

        $this->workHeaderContent = new WorkHeaderContent();
        $this->workWeFiredUpInnovated = new WorkWeFiredUpInnovated();
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'WorkHeaderContent' => new WorkHeaderContentResource($this->workHeaderContent->first()??''),
            'WorkWeFiredUpInnovated'=> new WorkWorkWeFiredUpInnovatedResource($this->workWeFiredUpInnovated->first()??''),

        ];

        return $this->ResponseData($data,'get Work Page Data Success',true,200);
    }
}
