<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SayHello\DeleteRequest;
use App\Http\Resources\Dashboard\SayHelloResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\SayHello;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SayHelloController extends Controller
{
    use Response,Pagination;

    public $sayHello;
    public $deleteRequest;

    public function __construct()
    {
        $this->sayHello = new SayHello();
        $this->deleteRequest = new DeleteRequest();

    }
    public function index()
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
            $query = $this->sayHello
                ->orWhere('fullName', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->sayHello;

        }

        $sayHello = $query->latest()->take($perPage)->skip($skip)->get();
        $sayHello_count = $query->count();

        $data = [
            "sayHello" => SayHelloResource::collection($sayHello),
            'pagination' => $this->paginate($sayHello_count,$perPage,$skip,$page,route('sayHello.index'))
        ];
        return $this->ResponseData($data, 'get All Say Hello Success',true, 200);
    }


    public function delete(Request $request){
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Say Hello Opreation Failed',false,400,$validator->errors());
        }else{
            $sayHello = $this->sayHello->find($request->id);
            if($sayHello == null){
                return $this->ResponseData(null,"Say Hello Not Found",false,400);
            }

            $sayHello->delete();

            return $this->ResponseData(null,"Say Hello Deleted Success",true,200);
        }
    }
}
