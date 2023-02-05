<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\Blog\BlogCategoryResource;
use App\Http\Resources\Frontend\Blog\BlogResource;
use App\Http\Traits\Response;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogAuthor;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogImages;
use App\Models\Blog\BlogParagraph;
use App\Models\Blog\BlogParagraphImages;
use App\Models\Blog\BlogParagraphSeo;

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
    }

    public function category()
    {

        $category = $this->blogCategory->latest()->get();
        

        return $this->ResponseData(BlogCategoryResource::collection($category), 'Get All Blogs Categories Operation Success',true, 200);
    }

    public function index()
    {

        $search = null;
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }

        $category = null;
        if(array_key_exists('category',$_GET)){
            $category = $_GET['category'];
        }



        if ($search != null) {
            $query = $this->blog
                ->orWhere('category',$search )
                ->orWhere('author',$search )
                ->orWhere('titleEn', 'LIKE', '%' . $search . '%')
                ->orWhere('titleAr', 'LIKE', '%' . $search . '%');
        } elseif ($category != null) {
            $query = $this->blog
                ->orWhere('category',$category );
                
        } 
        else {
            $query = $this->blog;

        }

        $blog = $query->latest()->get();
        

        return $this->ResponseData(BlogResource::collection($blog), 'Get All Blogs Operation Success',true, 200);
    }

    public function find()
    {

        $search = null;
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }

        if($search == null){
            return $this->ResponseData(null, 'Get Blog Operation Failed',true, 400);

        }
        
        $blog = $this->blog->where('titleEn', 'LIKE', '%' . $search . '%')->orWhere('titleAr', 'LIKE', '%' . $search . '%')->first();
        
        if(!$blog){
            return $this->ResponseData(null, 'Get Blog Operation Failed',true, 400);
        }
        $data = [
            'blog' => new BlogResource($blog),
            'related_blog' => BlogResource::collection($this->blog->where('id','!=',$blog->id)->where('category','!=',$blog->category)->latest()->take(3)->get())
        ];
        

        return $this->ResponseData($data, 'Get Blog Operation Success',true, 200);
    }

    

    



}
