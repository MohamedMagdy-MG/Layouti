<?php

namespace App\Http\Controllers\API\Dashboard\Avatars;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Avatars\AvatarsAddressResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsFemaleNamesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsFemalePicturesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsMaleNamesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsMalePicturesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsPositionsResource;
use App\Http\Traits\Response;
use App\Imports\ImportAddress;
use App\Imports\ImportFemaleNames;
use App\Imports\ImportMaleNames;
use App\Imports\ImportPositions;
use App\Models\Avatars\AvatarsAddress;
use App\Models\Avatars\AvatarsFemaleNames;
use App\Models\Avatars\AvatarsFemalePictures;
use App\Models\Avatars\AvatarsMaleNames;
use App\Models\Avatars\AvatarsMalePictures;
use App\Models\Avatars\AvatarsPositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UiGeneratorController extends Controller
{
    use Response;

    public $avatarsMalePictures;
    public $avatarsFemalePictures;
    public $avatarsMaleNames;
    public $avatarsFemaleNames;
    public $avatarsAddress;
    public $avatarsPositions;

    public function __construct()
    {
        $this->avatarsMalePictures = new AvatarsMalePictures();
        $this->avatarsFemalePictures = new AvatarsFemalePictures();
        $this->avatarsMaleNames = new AvatarsMaleNames();
        $this->avatarsFemaleNames = new AvatarsFemaleNames();
        $this->avatarsAddress = new AvatarsAddress();
        $this->avatarsPositions = new AvatarsPositions();
        $this->middleware('checkAuth');
    }

    //Addresses
    public function importAddress(Request $request){
        $validator = Validator::make($request->only('file'),[
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Import UI Generator Addresses Opreation Failed',false,400,$validator->errors());
        }else{
            Excel::import(new ImportAddress,$request->file('file')->store('files'));
            return $this->ResponseData(AvatarsAddressResource::collection($this->avatarsAddress->latest()->get()),'Import All UI Generator Addresses Operation Success',true,200);
        }
    }
    public function editAddress(Request $request)
    {
        $validator = Validator::make($request->only('id','addressEn','addressAr'),[
            'id'=>'required|integer',
            'addressEn' => 'required',
            'addressAr' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit UI Generator Address Opreation Failed.',false,400);
        }else{
            $avatarsAddress = $this->avatarsAddress->find($request->id);
            if(!$avatarsAddress){
                return $this->ResponseData(null,'Edit UI Generator Address Opreation Failed',true,400);
            }
            $avatarsAddress->update([
                'addressEn' => $request->addressEn,
                'addressAr' => $request->addressAr
            ]);
            return $this->ResponseData(null,'Edit UI Generator Address Opreation Success',true,200);


        }
    }
    public function deleteAddress(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete UI Generator Address Opreation Failed.',false,400);
        }else{
            $avatarsAddress = $this->avatarsAddress->find($request->id);
            if(!$avatarsAddress){
                return $this->ResponseData(null,'Delete UI Generator Address Opreation Failed',true,400);
            }
            $avatarsAddress->delete();
            return $this->ResponseData(null,'Delete UI Generator Address Opreation Success',true,200);


        }
    }

    public function deleteAllAddress()
    { 
        $avatarsAddresses = $this->avatarsAddress->get();
        foreach ($avatarsAddresses as $avatarsAddress) {
            $avatarsAddress->delete();
        } 
        return $this->ResponseData(null,'Delete UI Generator All Address Opreation Success',true,200);
        
    }


    //Positions
    public function importPositions(Request $request){
        $validator = Validator::make($request->only('file'),[
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Import UI Generator Positions Opreation Failed',false,400,$validator->errors());
        }else{
            Excel::import(new ImportPositions,$request->file('file')->store('files'));
            return $this->ResponseData(AvatarsPositionsResource::collection($this->avatarsAddress->latest()->get()),'Import All UI Generator Positions Operation Success',true,200);
        }
    }
    public function editPositions(Request $request)
    {
        $validator = Validator::make($request->only('id','positionEn','positionAr'),[
            'id'=>'required|integer',
            'positionEn' => 'required',
            'positionAr' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit UI Generator Position Opreation Failed.',false,400);
        }else{
            $avatarsPositions = $this->avatarsPositions->find($request->id);
            if(!$avatarsPositions){
                return $this->ResponseData(null,'Edit UI Generator Position Opreation Failed',true,400);
            }
            $avatarsPositions->update([
                'positionEn' => $request->positionEn,
                'positionAr' => $request->positionAr
            ]);
            return $this->ResponseData(null,'Edit UI Generator Position Opreation Success',true,200);


        }
    }
    public function deletePositions(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete UI Generator Position Opreation Failed.',false,400);
        }else{
            $avatarsPositions = $this->avatarsPositions->find($request->id);
            if(!$avatarsPositions){
                return $this->ResponseData(null,'Delete UI Generator Position Opreation Failed',true,400);
            }
            $avatarsPositions->delete();
            return $this->ResponseData(null,'Delete UI Generator Position Opreation Success',true,200);


        }
    }


    public function deleteAllPositions()
    { 
        $avatarsPositionses = $this->avatarsPositions->get();
        foreach ($avatarsPositionses as $avatarsPositions) {
            $avatarsPositions->delete();
        } 
        return $this->ResponseData(null,'Delete UI Generator All Position Opreation Success',true,200);
        
    }


    //Male Names
    public function importMaleNames(Request $request){
        $validator = Validator::make($request->only('file'),[
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Import UI Generator Male Names Opreation Failed',false,400,$validator->errors());
        }else{
            Excel::import(new ImportMaleNames,$request->file('file')->store('files'));
            return $this->ResponseData(AvatarsMaleNamesResource::collection($this->avatarsAddress->latest()->get()),'Import All UI Generator Male Names Operation Success',true,200);
        }
    }
    public function editMaleNames(Request $request)
    {
        $validator = Validator::make($request->only('id','fnameEn','lnameEn','fnameAr','lnameAr'),[
            'id'=>'required|integer',
            'fnameEn' => 'required',
            'lnameEn' => 'required',
            'fnameAr' => 'required',
            'lnameAr' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit UI Generator Male Names Opreation Failed.',false,400);
        }else{
            $avatarsMaleNames = $this->avatarsMaleNames->find($request->id);
            if(!$avatarsMaleNames){
                return $this->ResponseData(null,'Edit UI Generator Male Names Opreation Failed',true,400);
            }
            $avatarsMaleNames->update([
                'fnameEn' => $request->fnameEn,
                'lnameEn' => $request->lnameEn,
                'fnameAr' => $request->fnameAr,
                'lnameAr' => $request->lnameAr
            ]);
            return $this->ResponseData(null,'Edit UI Generator Male Names Opreation Success',true,200);


        }
    }
    public function deleteMaleNames(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete UI Generator Male Names Opreation Failed.',false,400);
        }else{
            $avatarsMaleNames = $this->avatarsMaleNames->find($request->id);
            if(!$avatarsMaleNames){
                return $this->ResponseData(null,'Delete UI Generator Male Names Opreation Failed',true,400);
            }
            $avatarsMaleNames->delete();
            return $this->ResponseData(null,'Delete UI Generator Male Names Opreation Success',true,200);


        }
    }

    public function deleteAllMaleNames()
    { 
        $avatarsMaleNameses = $this->avatarsMaleNames->get();
        foreach ($avatarsMaleNameses as $avatarsMaleNames) {
            $avatarsMaleNames->delete();
        } 
        return $this->ResponseData(null,'Delete UI Generator All Male Names Opreation Success',true,200);
        
    }


    //Female Names
    public function importFemaleNames(Request $request){
        $validator = Validator::make($request->only('file'),[
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Import UI Generator Female Names Opreation Failed',false,400,$validator->errors());
        }else{
            Excel::import(new ImportFemaleNames,$request->file('file')->store('files'));
            return $this->ResponseData(AvatarsFemaleNamesResource::collection($this->avatarsAddress->latest()->get()),'Import All UI Generator Female Names Operation Success',true,200);
        }
    }
    public function editFemaleNames(Request $request)
    {
        $validator = Validator::make($request->only('id','fnameEn','lnameEn','fnameAr','lnameAr'),[
            'id'=>'required|integer',
            'fnameEn' => 'required',
            'lnameEn' => 'required',
            'fnameAr' => 'required',
            'lnameAr' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit UI Generator Female Names Opreation Failed.',false,400);
        }else{
            $avatarsFemaleNames = $this->avatarsFemaleNames->find($request->id);
            if(!$avatarsFemaleNames){
                return $this->ResponseData(null,'Edit UI Generator Female Names Opreation Failed',true,400);
            }
            $avatarsFemaleNames->update([
                'fnameEn' => $request->fnameEn,
                'lnameEn' => $request->lnameEn,
                'fnameAr' => $request->fnameAr,
                'lnameAr' => $request->lnameAr
            ]);
            return $this->ResponseData(null,'Edit UI Generator Female Names Opreation Success',true,200);


        }
    }
    public function deleteFemaleNames(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete UI Generator Female Names Opreation Failed.',false,400);
        }else{
            $avatarsFemaleNames = $this->avatarsFemaleNames->find($request->id);
            if(!$avatarsFemaleNames){
                return $this->ResponseData(null,'Delete UI Generator Female Names Opreation Failed',true,400);
            }
            $avatarsFemaleNames->delete();
            return $this->ResponseData(null,'Delete UI Generator Female Names Opreation Success',true,200);


        }
    }

    public function deleteAllFemaleNames()
    { 
        $avatarsFemaleNameses = $this->avatarsFemaleNames->get();
        foreach ($avatarsFemaleNameses as $avatarsFemaleNames) {
            $avatarsFemaleNames->delete();
        } 
        return $this->ResponseData(null,'Delete UI Generator All Female Names Opreation Success',true,200);
        
    }


    //Female Images
    public function addFemaleImages(Request $request){
        $validator = Validator::make($request->only('Avatars'),[
            'Avatars' => 'required|array'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add UI Generator Female Images Opreation Failed',false,400,$validator->errors());
        }else{
            $Avatars = $request->Avatars;
            if(count($Avatars) > 0){
                foreach ($Avatars as $key => $avatar) {
                    if(is_file($avatar)){
                        
                        $avatarName = 'media/Avatars/FemaleImages/'.time().'-'.$key.'-'.$avatar->getClientOriginalName();
                        $avatar->move('media/Avatars/FemaleImages',$avatarName);
                        $this->avatarsFemalePictures->create([
                            'avatar' => $avatarName,
                        ]);
                    }
                }
            }
            return $this->ResponseData(AvatarsFemalePicturesResource::collection($this->avatarsFemalePictures->latest()->get()),'Add All UI Generator Female Images Operation Success',true,200);
        }
    }
    public function editFemaleImages(Request $request)
    {
        $validator = Validator::make($request->only('id','avatar'),[
            'id'=>'required|integer',
            'avatar' => 'required|image',
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit UI Generator Female Image Opreation Failed.',false,400);
        }else{
            $avatarsFemalePictures = $this->avatarsFemalePictures->find($request->id);
            if(!$avatarsFemalePictures){
                return $this->ResponseData(null,'Edit UI Generator Female Image Opreation Failed',true,400);
            }

            $avatarName = $avatarsFemalePictures->avatar;
            if(is_file($request->avatar)){
                if($avatarsFemalePictures->avatar != null){
                    unlink($avatarsFemalePictures->avatar);
                }
                $imageName = 'media/Avatars/FemaleImages/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Avatars/FemaleImages',$imageName);
            }


            $avatarsFemalePictures->update([
                'avatar' => $avatarName,
            ]);
            return $this->ResponseData(null,'Edit UI Generator Female Image Opreation Success',true,200);


        }
    }
    public function deleteFemaleImages(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete UI Generator Female Image Opreation Failed.',false,400);
        }else{
            $avatarsFemalePictures = $this->avatarsFemalePictures->find($request->id);
            if(!$avatarsFemalePictures){
                return $this->ResponseData(null,'Delete UI Generator Female Image Opreation Failed',true,400);
            }

            if($avatarsFemalePictures->avatar != null){
                unlink($avatarsFemalePictures->avatar);
            }
            $avatarsFemalePictures->delete();
            return $this->ResponseData(null,'Delete UI Generator Female Images Opreation Success',true,200);


        }
    }

    public function deleteAllFemaleImages()
    { 
        $avatarsFemalePictureses = $this->avatarsFemalePictures->get();
        foreach ($avatarsFemalePictureses as $avatarsFemalePictures) {
            if($avatarsFemalePictures->avatar != null){
                unlink($avatarsFemalePictures->avatar);
            }
            $avatarsFemalePictures->delete();
        } 
        return $this->ResponseData(null,'Delete UI Generator All Female Images Opreation Success',true,200);
        
    }



    //Male Images
    public function addMaleImages(Request $request){
        $validator = Validator::make($request->only('Avatars'),[
            'Avatars' => 'required|array'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add UI Generator Male Images Opreation Failed',false,400,$validator->errors());
        }else{
            $Avatars = $request->Avatars;
            if(count($Avatars) > 0){
                foreach ($Avatars as $key => $avatar) {
                    if(is_file($avatar)){
                        $avatarName = 'media/Avatars/MaleImages/'.time().'-'.$key.'-'.$avatar->getClientOriginalName();
                        $avatar->move('media/Avatars/MaleImages',$avatarName);
                        $this->avatarsMalePictures->create([
                            'avatar' => $avatarName,
                        ]);
                    }
                }
            }
            return $this->ResponseData(AvatarsMalePicturesResource::collection($this->avatarsMalePictures->latest()->get()),'Add All UI Generator Male Images Operation Success',true,200);
        }
    }
    public function editMaleImages(Request $request)
    {
        $validator = Validator::make($request->only('id','avatar'),[
            'id'=>'required|integer',
            'avatar' => 'required|image',
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit UI Generator Male Image Opreation Failed.',false,400);
        }else{
            $avatarsMalePictures = $this->avatarsMalePictures->find($request->id);
            if(!$avatarsMalePictures){
                return $this->ResponseData(null,'Edit UI Generator Male Image Opreation Failed',true,400);
            }

            $avatarName = $avatarsMalePictures->avatar;
            if(is_file($request->avatar)){
                if($avatarsMalePictures->avatar != null){
                    unlink($avatarsMalePictures->avatar);
                }
                $imageName = 'media/Avatars/MaleImages/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Avatars/MaleImages',$imageName);
            }


            $avatarsMalePictures->update([
                'avatar' => $avatarName,
            ]);
            return $this->ResponseData(null,'Edit UI Generator Male Image Opreation Success',true,200);


        }
    }
    public function deleteMaleImages(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete UI Generator Male Image Opreation Failed.',false,400);
        }else{
            $avatarsMalePictures = $this->avatarsMalePictures->find($request->id);
            if(!$avatarsMalePictures){
                return $this->ResponseData(null,'Delete UI Generator Male Image Opreation Failed',true,400);
            }

            if($avatarsMalePictures->avatar != null){
                unlink($avatarsMalePictures->avatar);
            }
            $avatarsMalePictures->delete();
            return $this->ResponseData(null,'Delete UI Generator Male Images Opreation Success',true,200);


        }
    }

    public function deleteAllMaleImages()
    { 
        $avatarsMalePictureses = $this->avatarsMalePictures->get();
        foreach ($avatarsMalePictureses as $avatarsMalePictures) {
            if($avatarsMalePictures->avatar != null){
                unlink($avatarsMalePictures->avatar);
            }
            $avatarsMalePictures->delete();
        } 
        return $this->ResponseData(null,'Delete UI Generator All Male Images Opreation Success',true,200);
        
    }
}
