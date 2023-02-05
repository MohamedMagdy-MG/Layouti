<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SayHelloRequest;
use App\Http\Traits\Response;
use App\Models\SayHello;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SayHelloController extends Controller
{
    use Response;

    public $sayHello;
    public $sayHelloRequest;

    public function __construct()
    {
        $this->sayHello = new SayHello();
        $this->sayHelloRequest = new SayHelloRequest();

    }
    public function send(Request $request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            $errMessag = "فشلت عملية ارسال قل مرحبا ";
            $successMessag = "نجحت عملية ارسال قل مرحبا";
        }else{
            $errMessag = "Send Say Hello Opreation Failed.";
            $successMessag = "Send Say Hello Opreation Success.";
        }
        $validator = Validator::make($request->only('fullName','email','phone','message'),$this->sayHelloRequest->rules(),$this->sayHelloRequest->Message());
        if($validator->fails()){
            return $this->ResponseData(null,$errMessag,false,400,$validator->errors());
        }else{
            $this->sayHello->create([
                'fullName'  => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            return $this->ResponseData(null,$successMessag,true,200,$validator->errors());

        }
    }
}
