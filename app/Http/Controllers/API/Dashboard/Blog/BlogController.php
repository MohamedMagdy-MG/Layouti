<?php

namespace App\Http\Controllers\API\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Blog\BlogResource;
use App\Http\Traits\Response;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogAuthor;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogImages;
use App\Models\Blog\BlogParagraph;
use App\Models\Blog\BlogParagraphImages;
use App\Models\Blog\BlogParagraphSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    use Response;
    public $blog;
    public $blogImages;
    public $blogParagraph;
    public $blogParagraphSeo;
    public $blogParagraphImages;
    public $blogAuthor;
    public $blogCategory;

    public function __construct()
    {
        $this->blog = new Blog();
        $this->blogImages = new BlogImages();
        $this->blogParagraph = new BlogParagraph();
        $this->blogParagraphSeo = new BlogParagraphSeo();
        $this->blogParagraphImages = new BlogParagraphImages();
        $this->blogAuthor = new BlogAuthor();
        $this->blogCategory = new BlogCategory();
        $this->middleware('checkAuth');
    }

    public function index()
    {

        $search = null;
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }


        if ($search != null) {
            $query = $this->blog
                ->orWhere('category',$search )
                ->orWhere('author',$search )
                ->orWhere('titleEn', 'LIKE', '%' . $search . '%')
                ->orWhere('titleAr', 'LIKE', '%' . $search . '%');
        } else {
            $query = $this->blog;

        }

        $blog = $query->latest()->get();

        return $this->ResponseData(BlogResource::collection($blog), 'Get All Blogs Operation Success',true, 200);
    }

    public function save(Request $request)
    {

        $blogCategory = $this->blogCategory->find($request->category);
        if(!$blogCategory){
            return $this->ResponseData(null,'Add Blog Opreation Failed',false,400,['category'=>'Category Not Found']);
        }

        $blogAuthor = $this->blogAuthor->find($request->author);
        if(!$blogAuthor){
            return $this->ResponseData(null,'Add Blog Opreation Failed',false,400,['author'=>'Author Not Found']);
        }



        $Images_count  = 0 ;
        $Images = [];
        if($request->has('Images')){
            $Images_count   = count($request->Images);
            $Images  = $request->Images;
        }

        $Paragraphs_count  = 0 ;
        $Paragraphs = [];
        if($request->has('Paragraphs')){
            $Paragraphs_count   = count($request->Paragraphs);
            $Paragraphs  = $request->Paragraphs;
        }



        $blog = $this->blog->find($request->id);
        if(!$blog){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/Blog/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Blog',$imageName);
            }

            $seo_facebookImageName = null;
            if(is_file($request->seo_facebookImage)){
                $seo_facebookImageName = 'media/Blog/SEO/'.time().'-faceebook-'.$request->seo_facebookImage->getClientOriginalName();
                $request->seo_facebookImage->move('media/Blog/SEO',$seo_facebookImageName);
            }

            $request->category == "null" ? $category = null : $category = $request->category;
            $request->author == "null" ? $author = null : $author = $request->author;
            $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn;
            $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr;


            $blog = $this->blog->create([
                'category' => $category,
                'author' => $author,
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'image' => $imageName,
            ]);
            if($Images_count > 0){
                foreach($Images as $key => $Image){
                    $imageName = null;
                    if(is_file($Image['image'])){
                        $imageName = 'media/Blog/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                        $Image['image']->move('media/Blog/Images',$imageName);
                    }
                    

                    $this->blogImages->create([
                        'image' => $imageName,
                        'blog' => $blog->id,
                    ]);
                }
            }
            if($Paragraphs_count > 0){
                foreach($Paragraphs as $key => $Paragraph){
                    $Paragraph_Images_count  = 0 ;
                    $Paragraph_Images = [];
                    if(array_key_exists('ParagraphImages',$Paragraph)){
                        $Paragraph_Images_count   = count($Paragraph['ParagraphImages']);
                        $Paragraph_Images  = $Paragraph['ParagraphImages'];
                    }

                    $Paragraph['titleEn'] == "null" ? $titleEn = null : $titleEn = $Paragraph['titleEn'];
                    $Paragraph['titleAr'] == "null" ? $titleAr = null : $titleAr = $Paragraph['titleAr'];
                    $Paragraph['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $Paragraph['descriptionEn'];
                    $Paragraph['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $Paragraph['descriptionAr'];


                    $blogParagraph = $this->blogParagraph->create([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'blog' => $blog->id,
                    ]);
                    

                    if($Paragraph_Images_count > 0){
                        foreach($Paragraph_Images as $key => $Image){
                            $imageName = null;
                            if(is_file($Image['image'])){
                                $imageName = 'media/Blog/Paragraph/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                                $Image['image']->move('media/Blog/Paragraph/Images',$imageName);
                            }
                            return $this->blogParagraphImages->create([
                                'image' => $imageName,
                                'card' => $blogParagraph->id,
                            ]);
                             
                        }
                    }
                }
            }

            $request->seo_focusKeypharseEn == "null" ? $seo_focusKeypharseEn = null : $seo_focusKeypharseEn = $request->seo_focusKeypharseEn;
            $request->seo_focusKeypharseAr == "null" ? $seo_focusKeypharseAr = null : $seo_focusKeypharseAr = $request->seo_focusKeypharseAr;
            $request->seo_seoTitleEn == "null" ? $seo_seoTitleEn = null : $seo_seoTitleEn = $request->seo_seoTitleEn;
            $request->seo_seoTitleAr == "null" ? $seo_seoTitleAr = null : $seo_seoTitleAr = $request->seo_seoTitleAr;
            $request->seo_slugEn == "null" ? $seo_slugEn = null : $seo_slugEn = $request->seo_slugEn;
            $request->seo_slugAr == "null" ? $seo_slugAr = null : $seo_slugAr = $request->seo_slugAr;
            $request->seo_descriptionEn == "null" ? $seo_descriptionEn = null : $seo_descriptionEn = $request->seo_descriptionEn;
            $request->seo_descriptionAr == "null" ? $seo_descriptionAr = null : $seo_descriptionAr = $request->seo_descriptionAr;
            $request->seo_facebookTitleEn == "null" ? $seo_facebookTitleEn = null : $seo_facebookTitleEn = $request->seo_facebookTitleEn;
            $request->seo_facebookTitleAr == "null" ? $seo_facebookTitleAr = null : $seo_facebookTitleAr = $request->seo_facebookTitleAr;
            $request->seo_facebookDescriptionEn == "null" ? $seo_facebookDescriptionEn = null : $seo_facebookDescriptionEn = $request->seo_facebookDescriptionEn;
            $request->seo_facebookDescriptionAr == "null" ? $seo_facebookDescriptionAr = null : $seo_facebookDescriptionAr = $request->seo_facebookDescriptionAr;

            $this->blogParagraphSeo->create([
                'focusKeypharseEn' => $seo_focusKeypharseEn,
                'focusKeypharseAr' => $seo_focusKeypharseAr,
                'seoTitleEn' => $seo_seoTitleEn,
                'seoTitleAr' => $seo_seoTitleAr,
                'slugEn' => $seo_slugEn,
                'slugAr' => $seo_slugAr,
                'descriptionEn' => $seo_descriptionEn,
                'descriptionAr' => $seo_descriptionAr,
                'facebookImage' => $seo_facebookImageName,
                'facebookTitleEn' => $seo_facebookTitleEn,
                'facebookTitleAr' => $seo_facebookTitleAr,
                'facebookDescriptionEn' => $seo_facebookDescriptionEn,
                'facebookDescriptionAr' => $seo_facebookDescriptionAr,
                'blog' => $blog->id
            ]);



        }else{
            

            if($request->image == "null" ){
                $imageName = null;
                if($blog->image != null){
                    unlink($blog->image);
                }
            }
            else{
                $imageName = $blog->image;
                if(is_file($request->image)){
                    if($blog->image != null){
                        unlink($blog->image);
                    }
                    $imageName = 'media/Blog/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/Blog',$imageName);
                }
            }

            
            $request->category == "null" ? $category = null : $category = $request->category;
            $request->author == "null" ? $author = null : $author = $request->author;
            $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn;
            $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr;

            $blog->update([
                'category' => $category,
                'author' => $author,
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'image' => $imageName,
            ]);
            if($Images_count > 0){
                foreach($Images as $key => $Image){

                    $blogImages = $this->blogImages->where('blog',$blog->id)->skip($key)->first();
                    if($blogImages != null){


                        if($Image['image'] == "null"){
                            $imageName = null;
                            if($blogImages->image != null){
                                unlink($blogImages->image);
                            }
                        }
                        else{
                            $imageName = $blogImages->image;

                            if(is_file($Image['image'])){
                                if($blogImages->image != null){
                                    unlink($blogImages->image);
                                }
                                $imageName = 'media/Blog/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                                $Image['image']->move('media/Blog/Images',$imageName);
                            }
                        }

                        $blogImages->update([
                            'image' => $imageName,
                            'blog' => $blog->id,
                        ]);
                    }
                    else{
                        $imageName = null;

                        if(is_file($Image['image'])){
                            $imageName = 'media/Blog/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                            $Image['image']->move('media/Blog/Images',$imageName);
                        }

                        $this->blogImages->create([
                            'image' => $imageName,
                            'blog' => $blog->id,
                        ]);
                    }

                }
            }
            if($Paragraphs_count > 0){
                foreach($Paragraphs as $key => $Paragraph){
                    
                    $Paragraph_Images_count  = 0 ;
                    $Paragraph_Images = [];
                    if(array_key_exists('ParagraphImages',$Paragraph)){
                        $Paragraph_Images_count   = count($Paragraph['ParagraphImages']);
                        $Paragraph_Images  = $Paragraph['ParagraphImages'];
                    }

                    $blogParagraph = $this->blogParagraph->where('blog',$blog->id)->skip($key)->first();
                    
                    
                    $Paragraph['titleEn'] == "null" ? $titleEn = null : $titleEn = $Paragraph['titleEn'];
                    $Paragraph['titleAr'] == "null" ? $titleAr = null : $titleAr = $Paragraph['titleAr'];
                    $Paragraph['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $Paragraph['descriptionEn'];
                    $Paragraph['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $Paragraph['descriptionAr'];

                    

                    if($blogParagraph != null){
                        

                        $blogParagraph->update([
                            'titleEn' => $titleEn,
                            'titleAr' => $titleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr,
                            'blog' => $blog->id,
                         ]);

                         if($Paragraph_Images_count > 0){
                            foreach($Paragraph_Images as $key => $Image){

                                $blogParagraphImages = $this->blogParagraphImages->where('card',$blogParagraph->id)->skip($key)->first();
                                if($blogParagraphImages != null){
                                    if($Image['image'] == "null"){
                                        $imageName = null;
                                        if($blogParagraphImages->image != null){
                                            unlink($blogParagraphImages->image);
                                        }
                                    }
                                    else{
                                        $imageName = $blogParagraphImages->image;
                                        if(is_file($Image['image'])){
                                            if($blogParagraphImages->image != null){
                                                unlink($blogParagraphImages->image);
                                            }
                                            $imageName = 'media/Blog/Paragraph/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                                            $Image['image']->move('media/Blog/Paragraph/Images',$imageName);
                                        }
                                    }
                                    $blogParagraphImages->update([
                                        'image' => $imageName,
                                        'card' => $blogParagraph->id,
                                    ]);
                                }else{
                                    $imageName = null;
                                    if(is_file($Image['image'])){
                                        $imageName = 'media/Blog/Paragraph/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                                        $Image['image']->move('media/Blog/Paragraph/Images',$imageName);
                                    }
                                    $this->blogParagraphImages->create([
                                        'image' => $imageName,
                                        'card' => $blogParagraph->id,
                                    ]);
                                }
                            }
                        }

                    }
                    else{


                        $blogParagraph = $this->blogParagraph->create([
                            'titleEn' => $titleEn,
                            'titleAr' => $titleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr,
                            'blog' => $blog->id,
                        ]);

                        if($Paragraph_Images_count > 0){
                            foreach($Paragraph_Images as $key => $Image){

                                $blogParagraphImages = $this->blogParagraphImages->where('card',$blogParagraph->id)->skip($key)->first();
                                if($blogParagraphImages != null){


                                    if($Image['image'] == "null"){
                                        $imageName = null;
                                        if($blogParagraphImages->image != null){
                                            unlink($blogParagraphImages->image);
                                        }
                                    }
                                    else{

                                        $imageName = $blogParagraphImages->image;
                                        if(is_file($Image['image'])){
                                            if($blogParagraphImages->image != null){
                                                unlink($blogParagraphImages->image);
                                            }
                                            $imageName = 'media/Blog/Paragraph/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                                            $Image['image']->move('media/Blog/Paragraph/Images',$imageName);
                                        }
                                    }
                                    $blogParagraphImages->update([
                                        'image' => $imageName,
                                        'card' => $blogParagraph->id,
                                    ]);
                                }else{
                                    $imageName = null;
                                    if(is_file($Image['image'])){
                                        $imageName = 'media/Blog/Paragraph/Images/'.time().'-'.$Image['image']->getClientOriginalName();
                                        $Image['image']->move('media/Blog/Paragraph/Images',$imageName);
                                    }
                                    $this->blogParagraphImages->create([
                                        'image' => $imageName,
                                        'card' => $blogParagraph->id,
                                    ]);
                                }
                            }
                        }

                    }

                }
            }
            $blogParagraphSeo = $this->blogParagraphSeo->where('blog',$blog->id)->first();
            if($blogParagraphSeo != null){



                if($request->seo_facebookImage == null){
                    $seo_facebookImageName = null;
                    if($blogParagraphSeo->facebookImage != null){
                        unlink($blogParagraphSeo->facebookImage);
                    }
                }
                else{

                    if($request->seo_facebookImage == "null"){
                        $seo_facebookImageName = null;
                        if($blogParagraphSeo->facebookImage != null){
                            unlink($blogParagraphSeo->facebookImage);
                        }
                    }else{
                        $seo_facebookImageName = $blogParagraphSeo->facebookImage;
                        if(is_file($request->seo_facebookImage)){
                            if($blogParagraphSeo->facebookImage != null){
                                unlink($blogParagraphSeo->facebookImage);
                            }
                            $seo_facebookImageName = 'media/Blog/SEO/'.time().'-faceebook-'.$request->seo_facebookImage->getClientOriginalName();
                            $request->seo_facebookImage->move('media/Blog/SEO',$seo_facebookImageName);
                        }
                    }
                    
                }

                $request->seo_focusKeypharseEn == "null" ? $seo_focusKeypharseEn = null : $seo_focusKeypharseEn = $request->seo_focusKeypharseEn;
                $request->seo_focusKeypharseAr == "null" ? $seo_focusKeypharseAr = null : $seo_focusKeypharseAr = $request->seo_focusKeypharseAr;
                $request->seo_seoTitleEn == "null" ? $seo_seoTitleEn = null : $seo_seoTitleEn = $request->seo_seoTitleEn;
                $request->seo_seoTitleAr == "null" ? $seo_seoTitleAr = null : $seo_seoTitleAr = $request->seo_seoTitleAr;
                $request->seo_slugEn == "null" ? $seo_slugEn = null : $seo_slugEn = $request->seo_slugEn;
                $request->seo_slugAr == "null" ? $seo_slugAr = null : $seo_slugAr = $request->seo_slugAr;
                $request->seo_descriptionEn == "null" ? $seo_descriptionEn = null : $seo_descriptionEn = $request->seo_descriptionEn;
                $request->seo_descriptionAr == "null" ? $seo_descriptionAr = null : $seo_descriptionAr = $request->seo_descriptionAr;
                $request->seo_facebookTitleEn == "null" ? $seo_facebookTitleEn = null : $seo_facebookTitleEn = $request->seo_facebookTitleEn;
                $request->seo_facebookTitleAr == "null" ? $seo_facebookTitleAr = null : $seo_facebookTitleAr = $request->seo_facebookTitleAr;
                $request->seo_facebookDescriptionEn == "null" ? $seo_facebookDescriptionEn = null : $seo_facebookDescriptionEn = $request->seo_facebookDescriptionEn;
                $request->seo_facebookDescriptionAr == "null" ? $seo_facebookDescriptionAr = null : $seo_facebookDescriptionAr = $request->seo_facebookDescriptionAr;


                $blogParagraphSeo->update([
                    'focusKeypharseEn' => $seo_focusKeypharseEn,
                    'focusKeypharseAr' => $seo_focusKeypharseAr,
                    'seoTitleEn' => $seo_seoTitleEn,
                    'seoTitleAr' => $seo_seoTitleAr,
                    'slugEn' => $seo_slugEn,
                    'slugAr' => $seo_slugAr,
                    'descriptionEn' => $seo_descriptionEn,
                    'descriptionAr' => $seo_descriptionAr,
                    'facebookImage' => $seo_facebookImageName,
                    'facebookTitleEn' => $seo_facebookTitleEn,
                    'facebookTitleAr' => $seo_facebookTitleAr,
                    'facebookDescriptionEn' => $seo_facebookDescriptionEn,
                    'facebookDescriptionAr' => $seo_facebookDescriptionAr,
                    'blog' => $blog->id
                ]);
            }
            else{
                $seo_facebookImageName = null;
                if(is_file($request->seo_facebookImage)){
                    $seo_facebookImageName = 'media/Blog/SEO/'.time().'-faceebook-'.$request->seo_facebookImage->getClientOriginalName();
                    $request->seo_facebookImage->move('media/Blog/SEO',$seo_facebookImageName);
                }

                $request->seo_focusKeypharseEn == "null" ? $seo_focusKeypharseEn = null : $seo_focusKeypharseEn = $request->seo_focusKeypharseEn;
                $request->seo_focusKeypharseAr == "null" ? $seo_focusKeypharseAr = null : $seo_focusKeypharseAr = $request->seo_focusKeypharseAr;
                $request->seo_seoTitleEn == "null" ? $seo_seoTitleEn = null : $seo_seoTitleEn = $request->seo_seoTitleEn;
                $request->seo_seoTitleAr == "null" ? $seo_seoTitleAr = null : $seo_seoTitleAr = $request->seo_seoTitleAr;
                $request->seo_slugEn == "null" ? $seo_slugEn = null : $seo_slugEn = $request->seo_slugEn;
                $request->seo_slugAr == "null" ? $seo_slugAr = null : $seo_slugAr = $request->seo_slugAr;
                $request->seo_descriptionEn == "null" ? $seo_descriptionEn = null : $seo_descriptionEn = $request->seo_descriptionEn;
                $request->seo_descriptionAr == "null" ? $seo_descriptionAr = null : $seo_descriptionAr = $request->seo_descriptionAr;
                $request->seo_facebookTitleEn == "null" ? $seo_facebookTitleEn = null : $seo_facebookTitleEn = $request->seo_facebookTitleEn;
                $request->seo_facebookTitleAr == "null" ? $seo_facebookTitleAr = null : $seo_facebookTitleAr = $request->seo_facebookTitleAr;
                $request->seo_facebookDescriptionEn == "null" ? $seo_facebookDescriptionEn = null : $seo_facebookDescriptionEn = $request->seo_facebookDescriptionEn;
                $request->seo_facebookDescriptionAr == "null" ? $seo_facebookDescriptionAr = null : $seo_facebookDescriptionAr = $request->seo_facebookDescriptionAr;

                $this->blogParagraphSeo->create([
                    'focusKeypharseEn' => $seo_focusKeypharseEn,
                    'focusKeypharseAr' => $seo_focusKeypharseAr,
                    'seoTitleEn' => $seo_seoTitleEn,
                    'seoTitleAr' => $seo_seoTitleAr,
                    'slugEn' => $seo_slugEn,
                    'slugAr' => $seo_slugAr,
                    'descriptionEn' => $seo_descriptionEn,
                    'descriptionAr' => $seo_descriptionAr,
                    'facebookImage' => $seo_facebookImageName,
                    'facebookTitleEn' => $seo_facebookTitleEn,
                    'facebookTitleAr' => $seo_facebookTitleAr,
                    'facebookDescriptionEn' => $seo_facebookDescriptionEn,
                    'facebookDescriptionAr' => $seo_facebookDescriptionAr,
                    'blog' => $blog->id
                ]);

            }


        }




        return $this->ResponseData(null,'Update Or Add Blog Opreation Success',true,200);


    }

    public function deleteImage(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Blog Image Opreation Failed.',false,400);
        }else{
            $blogImages = $this->blogImages->find($request->id);
            if(!$blogImages){
                return $this->ResponseData(null,'Delete Blog Image Opreation Failed',true,400);
            }
            if($blogImages->image != null){
                unlink($blogImages->image);
            }
            $blogImages->delete();
            return $this->ResponseData(null,'Delete Blog Image Opreation Success',true,200);
        }
    }

    public function deleteParagraphImage(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Blog Paragraph Image Opreation Failed.',false,400);
        }else{
            $blogParagraphImages = $this->blogParagraphImages->find($request->id);
            if(!$blogParagraphImages){
                return $this->ResponseData(null,'Delete Blog Image Paragraph Opreation Failed',true,400);
            }
            if($blogParagraphImages->image != null){
                unlink($blogParagraphImages->image);
            }
            $blogParagraphImages->delete();
            return $this->ResponseData(null,'Delete Blog Paragraph Image Opreation Success',true,200);
        }
    }

    public function deleteParagraph(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Blog Paragraph Opreation Failed.',false,400);
        }else{
            $blogParagraph = $this->blogParagraph->find($request->id);
            if(!$blogParagraph){
                return $this->ResponseData(null,'Delete Blog Paragraph Opreation Failed',true,400);
            }
            foreach($blogParagraph->Cards as $card){
                if($card != null){
                    if($card->image != null){
                        unlink($card->image);
                    }
                }
            }

            $blogParagraph->delete();
            return $this->ResponseData(null,'Delete Blog Paragraph Opreation Success',true,200);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Blog Opreation Failed.',false,400);
        }else{
            $blog = $this->blog->find($request->id);
            if(!$blog){
                return $this->ResponseData(null,'Delete Blog Opreation Failed',true,400);
            }
            foreach($blog->Images as $Image){
                if($Image != null){
                    if($Image->image != null){
                        unlink($Image->image);
                    }
                }
            }

            foreach($blog->Paragraphs as $paragraph){
                if($paragraph != null){
                    foreach($paragraph->Cards as $card){
                        if($card != null){
                            if($card->image != null){
                                unlink($card->image);
                            }
                        }
                    }

                }
            }

            $blog->delete();
            return $this->ResponseData(null,'Delete Blog Opreation Success',true,200);
        }
    }



}
