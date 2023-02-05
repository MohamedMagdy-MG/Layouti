<?php

namespace App\Http\Controllers\API\Dashboard\Avatars;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Avatars\AvatarsAddressResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsContentGeneratorResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsFemaleNamesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsFemalePicturesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsImagesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsMaleNamesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsMalePicturesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsParagraphsResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsPositionsResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsTitlesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsUIGeneratorResource;
use App\Http\Traits\Response;
use App\Models\Avatars\AvatarsAddress;
use App\Models\Avatars\AvatarsContentGenerator;
use App\Models\Avatars\AvatarsFemaleNames;
use App\Models\Avatars\AvatarsFemalePictures;
use App\Models\Avatars\AvatarsImages;
use App\Models\Avatars\AvatarsMaleNames;
use App\Models\Avatars\AvatarsMalePictures;
use App\Models\Avatars\AvatarsParagraphs;
use App\Models\Avatars\AvatarsPositions;
use App\Models\Avatars\AvatarsTitles;
use App\Models\Avatars\AvatarsUIGenerator;

class AvatarsHomeController extends Controller
{

    use Response;

    public $avatarsUIGenerator;
    public $avatarsContentGenerator;

    public $avatarsMalePictures;
    public $avatarsFemalePictures;
    public $avatarsMaleNames;
    public $avatarsFemaleNames;
    public $avatarsAddress;
    public $avatarsPositions;

    public $avatarsImages;
    public $avatarsTitles;
    public $avatarsParagraphs;
    

    public function __construct()
    {
        $this->avatarsUIGenerator = new AvatarsUIGenerator();
        $this->avatarsContentGenerator = new AvatarsContentGenerator();

        $this->avatarsMalePictures = new AvatarsMalePictures();
        $this->avatarsFemalePictures = new AvatarsFemalePictures();
        $this->avatarsMaleNames = new AvatarsMaleNames();
        $this->avatarsFemaleNames = new AvatarsFemaleNames();
        $this->avatarsAddress = new AvatarsAddress();
        $this->avatarsPositions = new AvatarsPositions();

        $this->avatarsImages = new AvatarsImages();
        $this->avatarsTitles = new AvatarsTitles();
        $this->avatarsParagraphs = new AvatarsParagraphs();


        $this->middleware('checkAuth');
    }

    public function HomeUIGenerator()
    {
        
        return $this->ResponseData(new AvatarsUIGeneratorResource($this->avatarsUIGenerator->first()??''),'get Home UI Generator Page Data Success',true,200);
    }

    public function HomeContentGenerator()
    {
        
        return $this->ResponseData(new AvatarsContentGeneratorResource($this->avatarsContentGenerator->first()??''),'get Home Conten tGenerator Page Data Success',true,200);
    }

    public function UIGenerator()
    {
        $data = [
            'MalePicture' => AvatarsMalePicturesResource::collection($this->avatarsMalePictures->latest()->get()),
            'FemalePictures' => AvatarsFemalePicturesResource::collection($this->avatarsFemalePictures->latest()->get()),
            'MaleNames' => AvatarsMaleNamesResource::collection($this->avatarsMaleNames->latest()->get()),
            'FemaleNames' => AvatarsFemaleNamesResource::collection($this->avatarsFemaleNames->latest()->get()),
            'Address' => AvatarsAddressResource::collection($this->avatarsAddress->latest()->get()),
            'Positions' => AvatarsPositionsResource::collection($this->avatarsPositions->latest()->get()),
        ];
        return $this->ResponseData($data,'get Avatars UI Generator Data Success',true,200);
    }

    public function ContentGenerator()
    {
        $data = [
            'Images' => AvatarsImagesResource::collection($this->avatarsImages->latest()->get()),
            'Titles' => AvatarsTitlesResource::collection($this->avatarsTitles->latest()->get()),
            'Paragraphs' => AvatarsParagraphsResource::collection($this->avatarsParagraphs->latest()->get()),
        ];
        return $this->ResponseData($data,'get Avatars Content Generator Data Success',true,200);
    }
}
