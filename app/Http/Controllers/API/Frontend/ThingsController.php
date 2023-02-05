<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\ThingsPage\HeaderContentResource;
use App\Http\Resources\Frontend\ThingsPage\OpportunityAlwaysExistsResource;
use App\Http\Traits\Response;
use App\Models\ThingsPage\ThingsHeaderContent;
use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use Illuminate\Http\Request;

class ThingsController extends Controller
{
    use Response;

    public $headerContent;
    public $thingsOpportunityAlwaysExists;

    public function __construct()
    {

        $this->headerContent = new ThingsHeaderContent();
        $this->thingsOpportunityAlwaysExists = new ThingsOpportunityAlwaysExists();
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
