<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\HireUsRequest;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiBudget;
use App\Models\Configurations\LayoutiINeed;
use App\Models\HireUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HireUsController extends Controller
{
    use Response;

    public $hireUs;
    public $layoutiINeed;
    public $layoutiBudget;
    public $hireUsRequest;

    public function __construct()
    {
        $this->hireUs = new HireUs();
        $this->layoutiINeed = new LayoutiINeed();
        $this->layoutiBudget = new LayoutiBudget();
        $this->hireUsRequest = new HireUsRequest();

    }
    public function send(Request $request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            $errMessag = "فشلت عملية ارسال وظفني ";
            $successMessag = "نجحت عملية ارسال وظفني";
            $errBudget = "غير قادر على الحصول على التكلفة";
            $errINeed = "غير قادر على الحصول على المتطلبات";
        }else{
            $errMessag = "Send Hire Us Opreation Failed.";
            $successMessag = "Send Say Hello Opreation Success.";
            $errBudget = "Layouti Budget Not Found";
            $errINeed = "Layouti I Need Not Found";
        }
        $validator = Validator::make($request->only('fullName','email','need','details','attachment','budget'),$this->hireUsRequest->rules(),$this->hireUsRequest->Message());
        if($validator->fails()){
            return $this->ResponseData(null,$errMessag,false,400,$validator->errors());
        }else{
            
            $layoutiINeed = $this->layoutiINeed->find($request->need);
            if(!$layoutiINeed){
                return $this->ResponseData(null,$errINeed,false,400,['need'=>$errINeed]);
            }
            $layoutiBudget = $this->layoutiBudget->find($request->budget);
            if(!$layoutiBudget){
                return $this->ResponseData(null,$errBudget,false,400,['budget'=>$errBudget]);
            }
            

            $fileName = null;
            if(is_file($request->attachment)){
                $fileName = 'media/HireUs/Files/'.time().'-'.$request->fullName.'-'.$request->attachment->getClientOriginalName();
                $request->attachment->move('media/HireUs/Files',$fileName);
            }

            $this->hireUs->create([
                'fullName'  => $request->fullName,
                'email' => $request->email,
                'need' => json_encode($request->need),
                'details' => $request->details,
                'attachment' => $fileName,
                'budget' => $request->budget,
            ]);

            return $this->ResponseData(null,$successMessag,true,200);

        }
    }
}
