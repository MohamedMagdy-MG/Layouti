<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\BudgetResource;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BudgetController extends Controller
{
    use Response;

    public $layoutiBudget;

    public function __construct()
    {
        $this->layoutiBudget = new LayoutiBudget();
    }

    public function All()
    {
        $layoutiBudget = $this->layoutiBudget->get();
        return $this->ResponseData(BudgetResource::collection($layoutiBudget),'Get All Layouti Budget Operation Success',true,200);

    }

}
