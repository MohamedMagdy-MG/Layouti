<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\CountriesResource;
use App\Http\Traits\Response;
use App\Models\Configurations\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    use Response;

    public $countries;

    public function __construct()
    {
        $this->countries = new Countries();
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
            $query = $this->countries
                ->orWhere('nameEn', 'LIKE', '%' . $search . '%')
                ->orWhere('nameAr', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->user;

        }

        $countries = $query->latest()->take($perPage)->skip($skip)->get();
        $countries_count = $query->count();

        $data = [
            "countries" => CountriesResource::collection($countries),
            'pagination' => $this->paginate($countries_count,$perPage,$skip,$page,route('countries.index'))
        ];
        return $this->ResponseData($data, 'get All Layouti Countries Success',true, 200);

    }

    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('code','nameAr','nameEn','status','currency'),[
            'code' => 'required',
            'nameAr' => 'required',
            'nameEn' => 'required',
            'status'  => 'required|integer',
            'currency'  => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Layouti Countries Operation Failed',false,400,$validator->errors());
        }
        
        $this->countries->create([
            'code' => $request->code,
            'nameAr' => $request->nameAr,
            'nameEn' => $request->nameEn,
            'status' => $request->status,
            'currency' => $request->currency

        ]);
        return $this->ResponseData(null,'Add Layouti Countries Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $countries = $this->countries->find($request->id);
        if(!$countries){
            return $this->ResponseData(null,'Layouti Country Not Found',false,400);
        }
        $validator = Validator::make($request->only('id','code','nameAr','nameEn','status','currency'),[
            'id' => 'required',
            'code' => 'required',
            'nameAr' => 'required',
            'nameEn' => 'required',
            'status'  => 'required|integer',
            'currency'  => 'required'
        ]);
        
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti countries Operation Failed',false,400,$validator->errors());
        }
        

       

        $countries->update([
            'code' => $request->code,
            'nameAr' => $request->nameAr,
            'nameEn' => $request->nameEn,
            'status' => $request->status,
            'currency' => $request->currency
        ]);
        
        $countries_find = $this->countries->find($request->id);
        return $this->ResponseData(new CountriesResource($countries_find),'Update Layouti Countries Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti Countries Operation Failed',false,400,$validator->errors());
        }
        $countries = $this->countries->find($request->id);
        if(!$countries){
            return $this->ResponseData(null,'Layouti Countries Not Found',false,400);
        }

        $countries->Delete();
        return $this->ResponseData(null,'Delete Layouti Countries Operation Success',true,200);

    }
}
