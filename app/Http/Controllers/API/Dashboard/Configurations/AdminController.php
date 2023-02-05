<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Configurations\Admins\AddRequest;
use App\Http\Requests\Dashboard\Configurations\Admins\DeleteRequest;
use App\Http\Requests\Dashboard\Configurations\Admins\UpdateRequest;
use App\Http\Resources\Dashboard\Configurations\AdminsResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    use Response,Pagination;

    public $user;
    public $addRequest;
    public $updateRequest;
    public $deleteRequest;

    public function __construct()
    {
        $this->user = new User();
        $this->addRequest = new AddRequest();
        $this->updateRequest = new UpdateRequest();
        $this->deleteRequest = new DeleteRequest();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $perPage  = 10;
        $page = 1;
        $search = null;
        if(array_key_exists('perPage',$_GET)){
            $perPage = $_GET['perPage'];
        }
        if(array_key_exists('page',$_GET)){
            $page = $_GET['page'];
        }
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }


        $skip = $perPage * ($page-1);
        if ($search != null) {
            $query = $this->user
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->user;

        }

        $user = $query->latest()->take($perPage)->skip($skip)->get();
        $user_count = $query->count();

        $data = [
            "user" => AdminsResource::collection($user),
            'pagination' => $this->paginate($user_count,$perPage,$skip,$page,route('admins.index'))
        ];
        return $this->ResponseData($data, 'get All Layouti Admins Success',true, 200);

    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('name','email','password','image'),$this->addRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Add Layouti Admin Operation Failed',false,400,$validator->errors());
        }
        $imageName = null;
        if(is_file($request->image)){
            $imageName = 'media/Admins/'.time().'-'.$request->name.'-'.$request->image->getClientOriginalName();
            $request->image->move('media/Admins',$imageName);
        }
        $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'image' => $imageName,
            'role' => 1
        ]);
        return $this->ResponseData(null,'Add Layouti Admin Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $user = $this->user->find($request->id);
        if(!$user){
            return $this->ResponseData(null,'Layouti Admin Not Found',false,400);
        }
        if($user->email == $request->email){
            $validator = Validator::make($request->only('id','name','password','image'),$this->updateRequest->rules());
        }
        else{
            $validator = Validator::make($request->only('id','name','email','password','image'),$this->updateRequest->rules());
        }
        
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti Admin Operation Failed',false,400,$validator->errors());
        }
        
        $request->name == null ? $name = $user->name : $name = $request->name;
        $request->email == null ? $email = $user->email : $email = $request->email;
        $request->password == null ? $password = $user->password : $password = Hash::make($request->password);

        $imageName = $user->image;
        if(is_file($request->image)){
            if($user->image != null){
                unlink($user->image);
            }
            $imageName = 'media/Admins/'.time().'-'.$request->name.'-'.$request->image->getClientOriginalName();
            $request->image->move('media/Admins',$imageName);
        }

        $user->update([
            'name' => $name,
            'email' => $email,
            'password'=>$password,
            'image' => $imageName,
        ]);
        
        $user_find = $this->user->find($request->id);
        return $this->ResponseData(new AdminsResource($user_find),'Update Layouti Admin Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti Admin Operation Failed',false,400,$validator->errors());
        }
        $user = $this->user->find($request->id);
        if(!$user){
            return $this->ResponseData(null,'Layouti Admin Not Found',false,400);
        }
        if($user->canDelete == 0){
            return $this->ResponseData(null,'Layouti Admin Can`t Delete Because it`s Default',false,400);
        }
        if($user->image != null){
            unlink($user->image);
        }

        $user->Delete();
        return $this->ResponseData(null,'Delete Layouti Admin Operation Success',true,200);

    }
}
