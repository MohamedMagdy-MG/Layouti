<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HireUs\DeleteRequest;
use App\Http\Resources\Dashboard\HireUsResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\HireUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HireUsController extends Controller
{
    use Response,Pagination;

    public $hireUs;
    public $deleteRequest;

    public function __construct()
    {
        $this->hireUs = new HireUs();
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
            $query = $this->hireUs
                ->orWhere('fullName', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->hireUs;

        }

        $hireUs = $query->latest()->take($perPage)->skip($skip)->get();
        $hireUs_count = $query->count();

        $data = [
            "hireUs" => HireUsResource::collection($hireUs),
            'pagination' => $this->paginate($hireUs_count,$perPage,$skip,$page,route('hireUs.index'))
        ];
        return $this->ResponseData($data, 'get All Hire Us Success',true, 200);
    }


    public function delete(Request $request){
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Hire Us Opreation Failed',false,400,$validator->errors());
        }else{
            $hireUs = $this->hireUs->find($request->id);
            if($hireUs == null){
                return $this->ResponseData(null,"Hire Us Not Found",false,400);
            }
            if($hireUs->attachment != null){
                if(is_file($hireUs->attachment)){
                    unlink($hireUs->attachment);
                }
            }
            $hireUs->delete();

            return $this->ResponseData(null,"Hire Us Deleted Success",true,200);
        }
    }
}
