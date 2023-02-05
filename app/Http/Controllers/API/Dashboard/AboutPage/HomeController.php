<?php

namespace App\Http\Controllers\API\Dashboard\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\AboutPage\AboutCheckOutOurClientsResource;
use App\Http\Resources\Dashboard\AboutPage\AboutHeaderContentResource;
use App\Http\Resources\Dashboard\AboutPage\AboutLearnAboutLayoutiResource;
use App\Http\Resources\Dashboard\AboutPage\AboutTeamResource;
use App\Http\Resources\Dashboard\AboutPage\AboutThroughOurValuesResource;
use App\Http\Traits\Response;
use App\Models\AboutPage\AboutCheckOutOurClients;
use App\Models\AboutPage\AboutHeaderContent;
use App\Models\AboutPage\AboutLearnAboutLayouti;
use App\Models\AboutPage\AboutTeam;
use App\Models\AboutPage\AboutThroughOurValues;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Response;

    public $aboutHeaderContent;
    public $aboutLearnAboutLayouti;
    public $aboutTeam;
    public $aboutThroughOurValues;
    public $aboutCheckOutOurClients;

    public function __construct()
    {

        $this->aboutHeaderContent = new AboutHeaderContent();
        $this->aboutLearnAboutLayouti = new AboutLearnAboutLayouti();
        $this->aboutTeam = new AboutTeam();
        $this->aboutThroughOurValues = new AboutThroughOurValues();
        $this->aboutCheckOutOurClients = new AboutCheckOutOurClients();
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'AboutHeaderContent' => new AboutHeaderContentResource($this->aboutHeaderContent->first()??''),
            'AboutLearnAboutLayouti'=> new AboutLearnAboutLayoutiResource($this->aboutLearnAboutLayouti->first()??''),
            'AboutTeam' => new AboutTeamResource($this->aboutTeam->first()??''),
            'AboutThroughOurValues' => new AboutThroughOurValuesResource($this->aboutThroughOurValues->first()??''),
            'AboutCheckOutOurClients' => new AboutCheckOutOurClientsResource($this->aboutCheckOutOurClients->first()??''),

        ];

        return $this->ResponseData($data,'get About Page Data Success',true,200);
    }
}

