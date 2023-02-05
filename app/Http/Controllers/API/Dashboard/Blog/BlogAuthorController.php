<?php

namespace App\Http\Controllers\API\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Blog\BlogAuthorResource;
use App\Http\Traits\Response;
use App\Models\Blog\BlogAuthor;
use Illuminate\Http\Request;

class BlogAuthorController extends Controller
{
    use Response;

    public $blogAuthor;

    public function __construct()
    {
        $this->blogAuthor = new BlogAuthor();
        $this->middleware('checkAuth');
    }

    public function All()
    {
        $blogAuthor = $this->blogAuthor->get();
        return $this->ResponseData(BlogAuthorResource::collection($blogAuthor),'Get All Blog Authors Operation Success',true,200);

    }
    public function Add(Request $request)
    {
        $imageName = null;
        if(is_file($request->image)){
            $imageName = 'media/Blog/Author/'.time().'-'.$request->image->getClientOriginalName();
            $request->image->move('media/Blog/Author',$imageName);
        }

        $request->nameEn == "null" ? $nameEn = null : $nameEn = $request->nameEn;
        $request->nameAr == "null" ? $nameAr = null : $nameAr = $request->nameAr;
        $request->positionEn == "null" ? $positionEn = null : $positionEn = $request->positionEn;
        $request->positionAr == "null" ? $positionAr = null : $positionAr = $request->positionAr;
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn;
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr;
        $this->blogAuthor->create([
            'image' => $imageName,
            'nameEn' => $nameEn,
            'nameAr' => $nameAr,
            'positionEn' => $positionEn,
            'positionAr' => $positionAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
        ]);
        return $this->ResponseData(null,'Add Blog Author Operation Success',false,200);

    }

    public function Update(Request $request)
    {
        $blogAuthor = $this->blogAuthor->find($request->id);
        if(!$blogAuthor){
            return $this->ResponseData(null,'Blog Author Not Found',false,400);
        }
        if($request->image == "null"){
            $imageName = null;
            if($blogAuthor->image != null){
                unlink($blogAuthor->image);
            }
        }else{
            $imageName = $blogAuthor->image;
            if(is_file($request->image)){
                if($blogAuthor->image != null){
                    unlink($imageName);
                }
                $imageName = 'media/Blog/Author/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Blog/Author',$imageName);
            }
        }
        

        $request->nameEn == "null" ? $nameEn = null : $nameEn = $request->nameEn;
        $request->nameAr == "null" ? $nameAr = null : $nameAr = $request->nameAr;
        $request->positionEn == "null" ? $positionEn = null : $positionEn = $request->positionEn;
        $request->positionAr == "null" ? $positionAr = null : $positionAr = $request->positionAr;
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn;
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr;

        $blogAuthor->update([
            'image' => $imageName,
            'nameEn' => $nameEn,
            'nameAr' => $nameAr,
            'positionEn' => $positionEn,
            'positionAr' => $positionAr,
            'descriptionEn' => $descriptionEn,
            'descriptionAr' => $descriptionAr,
        ]);
        return $this->ResponseData(null,'Update Blog Author Operation Success',true,200);

    }

    public function Delete(Request $request)
    {

        $blogAuthor = $this->blogAuthor->find($request->id);
        if(!$blogAuthor){
            return $this->ResponseData(null,'Blog Author Not Found',false,400);
        }

        if($blogAuthor->image != null){
            unlink($blogAuthor->image);
        }

        $blogAuthor->Delete();
        return $this->ResponseData(null,'Delete Blog Author Operation Success',true,200);

    }
}
