<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Configurations\Budget\AddRequest;
use App\Http\Requests\Dashboard\Configurations\Budget\DeleteRequest;
use App\Http\Requests\Dashboard\Configurations\Budget\UpdateRequest;
use App\Http\Resources\Dashboard\Configurations\BudgetResource;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BudgetController extends Controller
{
    use Response;

    public $layoutiBudget;
    public $addRequest;
    public $updateRequest;
    public $deleteRequest;

    public function __construct()
    {
        $this->layoutiBudget = new LayoutiBudget();
        $this->addRequest = new AddRequest();
        $this->updateRequest = new UpdateRequest();
        $this->deleteRequest = new DeleteRequest();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $layoutiBudget = $this->layoutiBudget->orderBy('order','ASC')->get();
        return $this->ResponseData(BudgetResource::collection($layoutiBudget),'Get All Layouti Budget Operation Success',true,200);

    }
    public function arrange(Request $request){


        $validator = Validator::make($request->only('ids'),[
            'ids' => 'required|array',
        ]);
        if($validator->fails()){
                return $this->ResponseData(null,'Update All Layouti Budget Opreation Failed.',false,400,$validator->errors());
        }else{

            if(count($request->ids) > 0){
                $order = 1;
                foreach($request->ids as $id){
                    $layoutiBudget = $this->layoutiBudget->find($id);
                    if ($layoutiBudget != null ) {
                        $layoutiBudget->update([
                            'order' => $order
                        ]);
                    }
                    $order = $order +1;
                }
            }
    
    
            return $this->ResponseData(null, 'Update All Layouti Budget Success',true, 200);
        }


    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('budgetEn','budgetAr'),$this->addRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Add Layouti Budget Operation Failed',false,400,$validator->errors());
        }

        $order = $this->layoutiBudget->orderBy('order','DESC')->first();
        if($order != null ){
            $order = $order->order +1 ;
        }else{
            $order = 1;
        }
        $this->layoutiBudget->create([
            'budgetEn' => $request->budgetEn,
            'budgetAr' => $request->budgetAr,
            'order' => $order
        ]);
        return $this->ResponseData(null,'Add Layouti Budget Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('id','budgetEn','budgetAr'),$this->updateRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti Budget Operation Failed',false,400,$validator->errors());
        }
        $layoutiBudget = $this->layoutiBudget->find($request->id);
        if(!$layoutiBudget){
            return $this->ResponseData(null,'Layouti Budget Not Found',false,400);
        }
        $request->budgetEn == null ? $budgetEn = $layoutiBudget->budgetEn : $budgetEn = $request->budgetEn;
        $request->budgetAr == null ? $budgetAr = $layoutiBudget->budgetAr : $budgetAr = $request->budgetAr;

        $layoutiBudget->update([
            'budgetEn' => $budgetEn,
            'budgetAr' => $budgetAr,
        ]);
        return $this->ResponseData(null,'Update Layouti Budget Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti Budget Operation Failed',false,400,$validator->errors());
        }
        $layoutiBudget = $this->layoutiBudget->find($request->id);
        if(!$layoutiBudget){
            return $this->ResponseData(null,'Layouti Budget Not Found',false,400);
        }

        $layoutiBudget->Delete();
        return $this->ResponseData(null,'Delete Layouti Budget Operation Success',true,200);

    }
}
