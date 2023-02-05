<?php

namespace App\Http\Controllers\API\Dashboard\ThingsPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ThingsPage\HeaderContentResource;
use App\Http\Resources\Dashboard\ThingsPage\OpportunityAlwaysExistsResource;
use App\Http\Traits\Response;
use App\Models\ThingsPage\ThingsHeaderContent;
use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Response;

    public $headerContent;
    public $thingsOpportunityAlwaysExists;

    public function __construct()
    {

        $this->headerContent = new ThingsHeaderContent();
        $this->thingsOpportunityAlwaysExists = new ThingsOpportunityAlwaysExists();
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new HeaderContentResource($this->headerContent->first()??''),
            'ThingsOpportunityAlwaysExists'=> OpportunityAlwaysExistsResource::collection($this->thingsOpportunityAlwaysExists->get()),

        ];

        return $this->ResponseData($data,'get 100Things Page Data Success',true,200);
    }
}
