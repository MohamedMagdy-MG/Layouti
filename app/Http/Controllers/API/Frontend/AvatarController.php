<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Avatars\AvatarsParagraphsResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsTitlesResource;
use App\Http\Resources\Frontend\Avatar\Female\AvatarsFemaleNamesResource;
use App\Http\Resources\Frontend\Avatar\Male\AvatarsMaleNamesResource;
use App\Http\Resources\Frontend\Avatar\AvatarsContentGeneratorResource;
use App\Http\Resources\Frontend\Avatar\AvatarsUIGeneratorResource;
use App\Http\Traits\Pagination;
use App\Http\Traits\Response;
use App\Models\Avatars\AvatarsContentGenerator;
use App\Models\Avatars\AvatarsFemaleNames;
use App\Models\Avatars\AvatarsMaleNames;
use App\Models\Avatars\AvatarsParagraphs;
use App\Models\Avatars\AvatarsTitles;
use App\Models\Avatars\AvatarsUIGenerator;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    use Response,Pagination;
    public $avatarsMaleNames;
    public $avatarsFemaleNames;
    public $avatarsUIGenerator;
    public $avatarsContentGenerator;

    public $avatarsTitles;
    public $avatarsParagraphs;
    

    public function __construct()
    {
        $this->avatarsMaleNames = new AvatarsMaleNames();
        $this->avatarsFemaleNames = new AvatarsFemaleNames();
        $this->avatarsUIGenerator = new AvatarsUIGenerator();
        $this->avatarsContentGenerator = new AvatarsContentGenerator();
        $this->avatarsTitles = new AvatarsTitles();
        $this->avatarsParagraphs = new AvatarsParagraphs();
        
    }
    public function UIGenerator()
    {
        return $this->ResponseData(new AvatarsUIGeneratorResource($this->avatarsUIGenerator->first()??''),'get Avatars UI Generator Pages Data Success',true,200);
    }
    public function ContentGenerator()
    {
        return $this->ResponseData(new AvatarsContentGeneratorResource($this->avatarsContentGenerator->first()??''),'get Avatars Content Generator Data Success',true,200);
    }
    public function Avatars()
    {
        $status = null;
        if(array_key_exists('status',$_GET)){
            $status = $_GET['status'];
        }

        $perPage = 9;
        if(array_key_exists('perPage',$_GET)){
            $perPage = $_GET['perPage'];
        }

        $skip = 0;
        if(array_key_exists('skip',$_GET)){
            $skip = $_GET['skip'];
        }

        $page = 0;
        if(array_key_exists('page',$_GET)){
            $page = $_GET['page'];
        }
        if($status == 'male' ){
            $avatarsMaleNames =AvatarsMaleNamesResource::collection($this->avatarsMaleNames->take($perPage)->skip($skip)->get());
            $total = $this->avatarsMaleNames->count();
            
            $data = [
                'avatars' => $avatarsMaleNames,
                'pagination' => $this->paginate($total,$perPage,$skip,$page,route('avatar'))
            ];
            return $this->ResponseData($data,'get All Male Avatars Operation Success',true,200);
        }
        elseif($status == 'female' ){
            $avatarsFemaleNames =AvatarsFemaleNamesResource::collection($this->avatarsFemaleNames->take($perPage)->skip($skip)->get());
            $total = $this->avatarsFemaleNames->count();
            
            $data = [
                'avatars' => $avatarsFemaleNames,
                'pagination' => $this->paginate($total,$perPage,$skip,$page,route('avatar'))
            ];
            return $this->ResponseData($data,'get All Female Avatars Operation Success',true,200);
        }
        else{
            $avatarsMaleNames =AvatarsMaleNamesResource::collection($this->avatarsMaleNames->take($perPage)->skip($skip)->get());
            $avatarsFemaleNames =AvatarsFemaleNamesResource::collection($this->avatarsFemaleNames->take($perPage)->skip($skip)->get());
            $all = [];
            foreach ($avatarsMaleNames as $avatarsMaleName) {
                array_push($all,$avatarsMaleName);
            }
            foreach ($avatarsFemaleNames as $avatarsFemaleName) {
                array_push($all,$avatarsFemaleName);
            }

            $data = [];
            foreach (array_rand($all,$perPage) as $object) {
                array_push($data,$all[$object]);
            }

            $total = $this->avatarsMaleNames->count() + $this->avatarsFemaleNames->count();
            $data = [
                'avatars' => $data,
                'pagination' => $this->paginate($total,$perPage,$skip,$page,route('avatar'))
            ];

            return $this->ResponseData($data,'get All Male And Female Avatars Operation Success',true,200);
        }

        
    }


    public function Content()
    {
        $status = null;
        if(array_key_exists('status',$_GET)){
            $status = $_GET['status'];
        }

        $perPage = 9;
        if(array_key_exists('perPage',$_GET)){
            $perPage = $_GET['perPage'];
        }

        $skip = 0;
        if(array_key_exists('skip',$_GET)){
            $skip = $_GET['skip'];
        }

        $page = 0;
        if(array_key_exists('page',$_GET)){
            $page = $_GET['page'];
        }


        if($status == 'paragrah' ){
            $avatarsParagraphs =AvatarsParagraphsResource::collection($this->avatarsParagraphs->take($perPage)->skip($skip)->get());
            $total = $this->avatarsParagraphs->count();
            
            $data = [
                'Content' => $avatarsParagraphs,
                'pagination' => $this->paginate($total,$perPage,$skip,$page,route('avatar'))
            ];
            return $this->ResponseData($data,'get All Content Paragraph Operation Success',true,200);
        }
        else{
            $avatarsTitles =AvatarsTitlesResource::collection($this->avatarsTitles->take($perPage)->skip($skip)->get());
            $total = $this->avatarsTitles->count();
            
            $data = [
                'Content' => $avatarsTitles,
                'pagination' => $this->paginate($total,$perPage,$skip,$page,route('content'))
            ];
            return $this->ResponseData($data,'get All Content Title Operation Success',true,200);
        }


        
    }
}
