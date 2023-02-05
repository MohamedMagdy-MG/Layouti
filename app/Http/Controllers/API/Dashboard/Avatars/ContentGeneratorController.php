<?php

namespace App\Http\Controllers\API\Dashboard\Avatars;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Avatars\AvatarsImagesResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsParagraphsResource;
use App\Http\Resources\Dashboard\Avatars\AvatarsTitlesResource;
use App\Http\Traits\Response;
use App\Imports\ImportParagraphs;
use App\Imports\ImportTitles;
use App\Models\Avatars\AvatarsImages;
use App\Models\Avatars\AvatarsParagraphs;
use App\Models\Avatars\AvatarsTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ContentGeneratorController extends Controller
{
    use Response;

    public $avatarsImages;
    public $avatarsTitles;
    public $avatarsParagraphs;

    public function __construct()
    {
        $this->avatarsImages = new AvatarsImages();
        $this->avatarsTitles = new AvatarsTitles();
        $this->avatarsParagraphs = new AvatarsParagraphs();
        $this->middleware('checkAuth');
    }

    //Title
    public function importTitle(Request $request){
        $validator = Validator::make($request->only('file'),[
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Import Content Generator Titles Opreation Failed',false,400,$validator->errors());
        }else{
            Excel::import(new ImportTitles,$request->file('file')->store('files'));
            return $this->ResponseData(AvatarsTitlesResource::collection($this->avatarsTitles->latest()->get()),'Import All Content Generator Titles Operation Success',true,200);
        }
    }

    // public function importTitle(Request $request){
    //     $validator = Validator::make($request->only('file'),[
    //         'file' => 'required|array'
    //     ]);
    //     if($validator->fails()){
    //         return $this->ResponseData(null,'Import Content Generator Titles Opreation Failed',false,400,$validator->errors());
    //     }else{
    //         $files = $request->file;
    //         if(count($files) > 0){
    //             foreach($files as $file){
    //                 $this->avatarsTitles->create([
    //                     'titleEn' => $file['titleEn'],
    //                     'titleAr' => $file['titleAr']
    //                 ]);
    //             }
    //         }
    //         return $this->ResponseData(AvatarsTitlesResource::collection($this->avatarsTitles->latest()->get()),'Import All Content Generator Titles Operation Success',true,200);
    //     }
    // }
    public function editTitle(Request $request)
    {
        $validator = Validator::make($request->only('id','titleEn','titleAr'),[
            'id'=>'required|integer',
            'titleEn' => 'required',
            'titleAr' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit Content Generator Title Opreation Failed.',false,400);
        }else{
            $avatarsTitles = $this->avatarsTitles->find($request->id);
            if(!$avatarsTitles){
                return $this->ResponseData(null,'Edit Content Generator Title Opreation Failed',true,400);
            }
            $avatarsTitles->update([
                'titleEn' => $request->titleEn,
                'titleAr' => $request->titleAr
            ]);
            return $this->ResponseData(AvatarsTitlesResource::collection($this->avatarsTitles->latest()->get()),'Edit Content Generator Title  Opreation Success',true,200);


        }
    }
    public function deleteTitle(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Content Generator Title Opreation Failed.',false,400);
        }else{
            $avatarsTitles = $this->avatarsTitles->find($request->id);
            if(!$avatarsTitles){
                return $this->ResponseData(null,'Delete Content Generator Title Opreation Failed',true,400);
            }
            $avatarsTitles->delete();
            return $this->ResponseData(null,'Delete Content Generator Title Opreation Success',true,200);


        }
    }

    public function deleteAllTitle()
    { 
        $avatarsTitleses = $this->avatarsTitles->get();
        foreach ($avatarsTitleses as $avatarsTitles) {
            $avatarsTitles->delete();
        } 
        return $this->ResponseData(null,'Delete Content Generator All Title Opreation Success',true,200);
        
    }

    //Paragraph
    public function importParagraph(Request $request){
        $validator = Validator::make($request->only('file'),[
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Import Content Generator Paragraphs Opreation Failed',false,400,$validator->errors());
        }else{
            Excel::import(new ImportParagraphs,$request->file('file')->store('files'));
            return $this->ResponseData(AvatarsParagraphsResource::collection($this->avatarsParagraphs->latest()->get()),'Import All Content Generator Paragraphs Operation Success',true,200);
        }
    }
    public function editParagraph(Request $request)
    {
        $validator = Validator::make($request->only('id','pharagraphEn','pharagraphAr'),[
            'id'=>'required|integer',
            'pharagraphEn' => 'required',
            'pharagraphAr' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit Content Generator Paragraph Opreation Failed.',false,400);
        }else{
            $avatarsParagraphs = $this->avatarsParagraphs->find($request->id);
            if(!$avatarsParagraphs){
                return $this->ResponseData(null,'Edit Content Generator Paragraph Opreation Failed',true,400);
            }
            $avatarsParagraphs->update([
                'pharagraphEn' => $request->pharagraphEn,
                'pharagraphAr' => $request->pharagraphAr
            ]);
            return $this->ResponseData(AvatarsParagraphsResource::collection($this->avatarsParagraphs->latest()->get()),'Edit Content Generator Paragraph Opreation Success',true,200);


        }
    }
    public function deleteParagraph(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Content Generator Paragraph Opreation Failed.',false,400);
        }else{
            $avatarsParagraphs = $this->avatarsParagraphs->find($request->id);
            if(!$avatarsParagraphs){
                return $this->ResponseData(null,'Delete Content Generator Paragraph Opreation Failed',true,400);
            }
            $avatarsParagraphs->delete();
            return $this->ResponseData(null,'Delete Content Generator Paragraph Opreation Success',true,200);


        }
    }

    public function deleteAllParagraph()
    { 
        $avatarsParagraphses = $this->avatarsParagraphs->get();
        foreach ($avatarsParagraphses as $avatarsParagraphs) {
            $avatarsParagraphs->delete();
        } 
        return $this->ResponseData(null,'Delete Content Generator All Title Opreation Success',true,200);
        
    }

    //Images
    public function addImages(Request $request){
        $validator = Validator::make($request->only('Images'),[
            'Images' => 'required|array'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Content Generator Images Opreation Failed',false,400,$validator->errors());
        }else{
            $Images = $request->Images;
            if(count($Images) > 0){
                foreach ($Images as $key => $image) {
                    if(is_file($image)){
                        $imageName = 'media/Avatars/Images/'.time().'-'.$key.'-'.$image->getClientOriginalName();
                        $image->move('media/Avatars/Images',$imageName);
                        $this->avatarsImages->create([
                            'image' => $imageName,
                        ]);
                    }
                }
            }
            return $this->ResponseData(AvatarsImagesResource::collection($this->avatarsImages->latest()->get()),'Add All Content Generator Images Operation Success',true,200);
        }
    }
    public function editImages(Request $request)
    {
        $validator = Validator::make($request->only('id','image'),[
            'id'=>'required|integer',
            'image' => 'required|image',
        ]);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Edit Content Generator Image Opreation Failed.',false,400);
        }else{
            $avatarsImages = $this->avatarsImages->find($request->id);
            if(!$avatarsImages){
                return $this->ResponseData(null,'Edit Content Generator Image Opreation Failed',true,400);
            }

            $imageName = $avatarsImages->image;
            if(is_file($request->image)){
                if($avatarsImages->image != null){
                    unlink($avatarsImages->image);
                }
                $imageName = 'media/Avatars/Images/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Avatars/Images',$imageName);
            }


            $avatarsImages->update([
                'image' => $imageName,
            ]);
            return $this->ResponseData(null,'Edit Content Generator Image Opreation Success',true,200);


        }
    }
    public function deleteImages(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Content Generator Image Opreation Failed.',false,400);
        }else{
            $avatarsImages = $this->avatarsImages->find($request->id);
            if(!$avatarsImages){
                return $this->ResponseData(null,'Delete Content Generator Image Opreation Failed',true,400);
            }

            if($avatarsImages->image != null){
                unlink($avatarsImages->image);
            }
            $avatarsImages->delete();
            return $this->ResponseData(null,'Delete Content Generator Images Opreation Success',true,200);


        }
    }

    public function deleteAllImages()
    { 
        $avatarsImageses = $this->avatarsImages->get();
        foreach ($avatarsImageses as $avatarsImages) {
            if($avatarsImages->image != null){
                unlink($avatarsImages->image);
            }
            $avatarsImages->delete();
        } 
        return $this->ResponseData(null,'Delete Content Generator All Images Opreation Success',true,200);
        
    }


    
}
