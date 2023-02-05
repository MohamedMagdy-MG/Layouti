<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LearnUi\DeleteRequest;
use App\Http\Resources\Dashboard\LearnUI\SendLearnUIResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\LearnUI\SendLearnUI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeranUiRegisterController extends Controller
{
    use Response,Pagination;

    public $sendLearnUI;
    public $deleteRequest;

    public function __construct()
    {
        $this->sendLearnUI = new SendLearnUI();
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
            $query = $this->sendLearnUI
                ->orWhere('fullName', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->sendLearnUI;

        }

        $sendLearnUI = $query->latest()->take($perPage)->skip($skip)->get();
        $sendLearnUI_count = $query->count();

        $data = [
            "reservation" => SendLearnUIResource::collection($sendLearnUI),
            'pagination' => $this->paginate($sendLearnUI_count,$perPage,$skip,$page,route('reservation.index'))
        ];
        return $this->ResponseData($data, 'get All Reservation Success',true, 200);
    }


    public function delete(Request $request){
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Reservation Opreation Failed',false,400,$validator->errors());
        }else{
            $sendLearnUI = $this->sendLearnUI->find($request->id);
            if($sendLearnUI == null){
                return $this->ResponseData(null,"Reservation Not Found",false,400);
            }
            
            $sendLearnUI->delete();

            return $this->ResponseData(null,"Reservation Deleted Success",true,200);
        }
    }
}
