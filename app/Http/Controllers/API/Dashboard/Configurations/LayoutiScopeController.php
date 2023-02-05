<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Configurations\Scope\AddRequest;
use App\Http\Requests\Dashboard\Configurations\Scope\DeleteRequest;
use App\Http\Requests\Dashboard\Configurations\Scope\UpdateRequest;
use App\Http\Resources\Dashboard\Configurations\ScopeResource;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiScope;
use App\Models\Configurations\LayoutiScopeCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayoutiScopeController extends Controller
{
    use Response;

    public $layoutiScope;
    public $layoutiScopeCard;
    public $addRequest;
    public $updateRequest;
    public $deleteRequest;

    public function __construct()
    {
        $this->layoutiScope = new LayoutiScope();
        $this->layoutiScopeCard = new LayoutiScopeCard();
        $this->addRequest = new AddRequest();
        $this->updateRequest = new UpdateRequest();
        $this->deleteRequest = new DeleteRequest();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $layoutiScope = $this->layoutiScope->get();
        return $this->ResponseData(ScopeResource::collection($layoutiScope),'Get All Layouti Scopes Operation Success',true,200);

    }
    public function AddCards($cards_count,$cards,$layoutiScopeID){
        if($cards_count > 0){
            foreach($cards as $key => $card){
                $layoutiScopeCard = $this->layoutiScopeCard->where('card',$layoutiScopeID)->skip($key)->first();
                if($layoutiScopeCard != null){
    
                    $imageName = $layoutiScopeCard->icon;
                    if(is_file($card['icon'])){
                        if($layoutiScopeCard->icon != null){
                            unlink($layoutiScopeCard->icon);
                        }
                        $imageName = 'media/Scopes/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                        $card['icon']->move('media/Scopes',$imageName);
                    }
                    $layoutiScopeCard->update([
                        'titleEn' => $card['titleEn'] == "null" ? NULL : $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] == "null" ? NULL : $card['titleAr'] ,
                        'descriptionEn' => $card['descriptionEn'] == "null" ? NULL : $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'] == "null" ? NULL : $card['descriptionAr'],
                        'icon' => $imageName,
                        'card' => $layoutiScopeID
                    ]);
                }else{
                    $imageName = null;
                    if(is_file($card['icon'])){
                        $imageName = 'media/Scopes/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                        $card['icon']->move('media/Scopes',$imageName);
                    }
                    $this->layoutiScopeCard->create([
                        'titleEn' => $card['titleEn'] == "null" ? NULL : $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] == "null" ? NULL : $card['titleAr'] ,
                        'descriptionEn' => $card['descriptionEn'] == "null" ? NULL : $card['descriptionEn'],
                        'descriptionAr' => $card['descriptionAr'] == "null" ? NULL : $card['descriptionAr'],
                        'icon' => $imageName,
                        'card' => $layoutiScopeID
                    ]);
               }
           }
        }
    }
    public function Add(Request $request)
    {
        $validator = Validator::make($request->only('scopes'),$this->addRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti Scope Operation Failed',false,400,$validator->errors());
        }
        if($request->has('scopes')){
            $scope_count   = count($request->scopes);
            $scopes  = $request->scopes;
        }
        
        
        if($scope_count > 0){
            if($scope_count > 0){
                foreach($scopes as $key => $scope){
                    
                    $layoutiScope = $this->layoutiScope->skip($key)->first();
                    if($layoutiScope != null){
    
                        $layoutiScope->update([
                            'titleEn' => $scope['titleEn'] == "null" ? NULL : $scope['titleEn'] ,
                            'titleAr' => $scope['titleAr'] == "null" ? NULL : $scope['titleAr'],

                        ]);
                        
                    }else{
                        
                        $layoutiScope = $this->layoutiScope->create([
                            'titleEn' => $scope['titleEn'] == "null" ? NULL : $scope['titleEn'] ,
                            'titleAr' => $scope['titleAr'] == "null" ? NULL : $scope['titleAr'],

                        ]);
        
                    }
                    $cards = [];
                    $cards_count = 0;
                    if(array_key_exists('cards',$scope)){
                        $cards_count   = count($scope['cards']);
                        $cards  = $scope['cards'];
                    }

                    $this->AddCards($cards_count,$cards,$layoutiScope->id);

                }
            }
        }


        return $this->ResponseData(null,'Update Layouti Scope Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->only('scopes'),$this->addRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Update Layouti Scope Operation Failed',false,400,$validator->errors());
        }
        if($request->has('scopes')){
            $scope_count   = count($request->scopes);
            $scopes  = $request->scopes;
        }
        
        if($scope_count > 0){
            if($scope_count > 0){
                foreach($scopes as $key => $scope){
                    $layoutiScope = $this->layoutiScope->skip($key)->first();
                    if($layoutiScope != null){

                        $layoutiScope->update([
                            'titleEn' => $scope['titleEn'] ,
                            'titleAr' => $scope['titleAr'] ,

                        ]);


                        $cards = [];
                        $cards_count   = count($scope['cards']);
                        $cards  = $scope['cards'];
                        

                        if($cards_count > 0){
                            foreach($cards as $key => $card){
                                $layoutiScopeCard = $this->layoutiScopeCard->skip($key)->first();
                                if($layoutiScopeCard != null){

                                    if($card['icon'] == "null"){
                                        $imageName = null;
                                        if($layoutiScopeCard->icon != null){
                                            unlink($layoutiScopeCard->icon);
                                        }
                                    }
                                    else{
                                        $imageName = $layoutiScopeCard->icon;
                                        if(is_file($card['icon'])){
                                            if($layoutiScopeCard->icon != null){
                                                unlink($layoutiScopeCard->icon);
                                            }
                                            $imageName = 'media/Scopes/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                                            $card['icon']->move('media/Scopes',$imageName);
                                        }
                                    }
                                    $layoutiScopeCard->update([
                                        'titleEn' => $card['titleEn'] ,
                                        'titleAr' => $card['titleAr'] ,
                                        'descriptionEn' => $card['descriptionEn'] ,
                                        'descriptionAr' => $card['descriptionAr'] ,
                                        'icon' => $imageName,
                                        'card' => $layoutiScope->id
                                    ]);
                                }else{
                                    $imageName = null;
                                    if(is_file($card['icon'])){
                                        $imageName = 'media/Scopes/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                                        $card['icon']->move('media/Scopes',$imageName);
                                    }
                                    $this->layoutiScopeCard->create([
                                        'titleEn' => $card['titleEn'] ,
                                        'titleAr' => $card['titleAr'] ,
                                        'descriptionEn' => $card['descriptionEn'] ,
                                        'descriptionAr' => $card['descriptionAr'] ,
                                        'icon' => $imageName,
                                        'card' => $layoutiScope->id
                                    ]);
                                }
                            }
                        }
                    }else{
                        $layoutiScope = $this->layoutiScope->create([
                            'titleEn' => $scope['titleEn'] ,
                            'titleAr' => $scope['titleAr'] ,

                        ]);



                        $cards = [];
                        $cards_count   = count($scope['cards']);
                        $cards  = $scope['cards'];
                        

                        if($cards_count > 0){
                            foreach($cards as $key => $card){
                                $layoutiScopeCard = $this->layoutiScopeCard->skip($key)->first();
                                if($layoutiScopeCard != null){

                                    $imageName = $layoutiScopeCard->icon;
                                    if(is_file($card['icon'])){
                                        if($layoutiScopeCard->icon != null){
                                            unlink($layoutiScopeCard->icon);
                                        }
                                        $imageName = 'media/Scopes/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                                        $card['icon']->move('media/Scopes',$imageName);
                                    }
                                    $layoutiScopeCard->update([
                                        'titleEn' => $card['titleEn'] ,
                                        'titleAr' => $card['titleAr'] ,
                                        'descriptionEn' => $card['descriptionEn'] ,
                                        'descriptionAr' => $card['descriptionAr'] ,
                                        'icon' => $imageName,
                                        'card' => $layoutiScope->id
                                    ]);
                                }else{
                                    $imageName = null;
                                    if(is_file($card['icon'])){
                                        $imageName = 'media/Scopes/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                                        $card['icon']->move('media/Scopes',$imageName);
                                    }
                                    $this->layoutiScopeCard->create([
                                        'titleEn' => $card['titleEn'] ,
                                        'titleAr' => $card['titleAr'] ,
                                        'descriptionEn' => $card['descriptionEn'] ,
                                        'descriptionAr' => $card['descriptionAr'] ,
                                        'icon' => $imageName,
                                        'card' => $layoutiScope->id
                                    ]);
                                }
                            }
                        }

                    }

                }
            }
        }


        return $this->ResponseData(null,'Update Layouti Scope Operation Success',true,200);

    }

    public function DeleteCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti Scope Operation Failed',false,400,$validator->errors());
        }
        $layoutiScopeCard = $this->layoutiScopeCard->find($request->id);
        if(!$layoutiScopeCard){
            return $this->ResponseData(null,'Layouti Scope Card Not Found',false,400);
        }

        if(is_file($layoutiScopeCard->icon)){
            if($layoutiScopeCard->icon != null){
                unlink($layoutiScopeCard->icon);
            }
        }


        $layoutiScopeCard->Delete();
        return $this->ResponseData(null,'Delete Layouti Scope Card Operation Success',true,200);

    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),$this->deleteRequest->rules());
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Layouti Scope Operation Failed',false,400,$validator->errors());
        }
        $layoutiScope = $this->layoutiScope->find($request->id);
        if(!$layoutiScope){
            return $this->ResponseData(null,'Layouti Scope Not Found',false,400);
        }
        $layoutiScopeCards = $this->layoutiScopeCard->where('card',$layoutiScope->id)->get();
        foreach ($layoutiScopeCards as $layoutiScopeCard) {
            if(is_file($layoutiScopeCard->icon)){
                if($layoutiScopeCard->icon != null){
                    unlink($layoutiScopeCard->icon);
                }
            }
            $layoutiScopeCard->delete();

        }


        $layoutiScope->Delete();
        return $this->ResponseData(null,'Delete Layouti Card Operation Success',true,200);

    }
}
