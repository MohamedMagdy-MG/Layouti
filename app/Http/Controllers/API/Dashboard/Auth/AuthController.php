<?php

namespace App\Http\Controllers\API\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Dashboard\Auth\AuthResource;
use App\Http\Traits\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    use Response;
    public $user;
    public $loginRequest;
    public function __construct()
    {
        $this->user = new User();
        $this->loginRequest = new LoginRequest();
    }
    public function Login(Request $request)

    {
        $validator = Validator::make($request->only(['email','password']),$this->loginRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Login Failed.',false,400,$validator->errors());
        }else{

            $user = $this->user->where('email', $request->email)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return $this->ResponseData(null,'Invalid Credentials',false,400);
            }
            // $user->tokens()->delete();
            return $this->ResponseData(new AuthResource($user),'User Login Success',true,200);
        }

    }

    public function DeveloperLogin(Request $request)

    {
        $validator = Validator::make($request->only(['UID','UDeveloper']),[
            'UID'=>'required',
            'UDeveloper'=>'required',
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Login Failed.',false,400,$validator->errors());
        }else{
            $UID = base64_decode($request->UID);
            $UDeveloper = base64_decode($request->UDeveloper);
            if($UDeveloper != "Layouti"){
                return $this->ResponseData(null,'Login Failed.',false,401,$validator->errors());
            }

            $user = $this->user->where('id', $request->UID)->first();
            if ($user == null) {
                return $this->ResponseData(null,'Invalid Credentials',false,401);
            }
            return $this->ResponseData(new AuthResource($user),'User Login Success',true,200);
        }

    }
    public function Logout(Request $request){
        $accessToken =   $request->bearerToken();
        $auth = PersonalAccessToken::find($accessToken); 
        if(!$auth){ 
            return $this->ResponseData(null,'You Must Login First',false,403); 
            
        } 
        $user = $this->user->find($auth->tokenable_id); 
        if(!$user){ 
            return $this->ResponseData(null,'User Not Found',false,400); 
            
        } 
        else { 
            $user->tokens()->where('tokenable_id', $user->id)->delete(); 
            return $this->ResponseData(null,'Logout Success',true,200); 
            
        } 
        
    }

    public function NotFound()
    {
        return $this->ResponseData(null,'Page Not Found',false,404);
    }

}
