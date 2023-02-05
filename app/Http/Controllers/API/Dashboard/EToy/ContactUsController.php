<?php

namespace App\Http\Controllers\API\Dashboard\EToy;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\EToy\ContactUsResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\EToy\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    use Response,Pagination;

    public $contactUs;
    public $deleteRequest;

    public function __construct()
    {
        $this->contactUs = new ContactUs();
        $this->middleware('checkAuth');

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
            $query = $this->contactUs
                ->orWhere('fullName', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->contactUs;

        }

        $contactUs = $query->latest()->take($perPage)->skip($skip)->get();
        $contactUs_count = $query->count();

        $data = [
            "contactUs" => ContactUsResource::collection($contactUs),
            'pagination' => $this->paginate($contactUs_count,$perPage,$skip,$page,route('contactUs.index'))
        ];
        return $this->ResponseData($data, 'get EToy All Contact Us Success',true, 200);
    }


    public function delete(Request $request){
        $validator = Validator::make($request->only('id'),['id' => 'required']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete EToy Contact Us Opreation Failed',false,400,$validator->errors());
        }else{
            $contactUs = $this->contactUs->find($request->id);
            if($contactUs == null){
                return $this->ResponseData(null,"EToy Contact Us Not Found",false,400);
            }

            $contactUs->delete();

            return $this->ResponseData(null,"EToy Contact Us Deleted Success",true,200);
        }
    }
}
