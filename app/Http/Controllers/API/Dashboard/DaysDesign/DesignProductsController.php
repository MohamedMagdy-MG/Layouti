<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DaysDesign\DesignProjectResource;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignCategory;
use App\Models\DaysDesign\DesignProject;
use App\Models\DaysDesign\DesignProjectImages;
use App\Models\DaysDesign\DesignProjectInformations;
use App\Models\DaysDesign\DesignProjectSEO;
use Illuminate\Http\Request;
use App\Http\Traits\Pagination;
use App\Models\DaysDesign\DesignProjectCoverImages;
use Illuminate\Support\Facades\Validator;

class DesignProductsController extends Controller
{
    use Response , Pagination;
    public $designProject;
    public $designProjectInformations;
    public $designProjectImages;
    public $designProjectSEO;
    public $designCategory;
    public $designProjectCoverImages;

    public function __construct()
    {
        $this->designProject = new DesignProject();
        $this->designProjectInformations = new DesignProjectInformations();
        $this->designProjectImages = new DesignProjectImages();
        $this->designProjectCoverImages = new DesignProjectCoverImages();
        $this->designProjectSEO = new DesignProjectSEO();
        $this->designCategory = new DesignCategory();
        $this->middleware('checkAuth');
    }

    public function index()
    {
        $perPage  = 10;
        $page = 1;
        $search = null;
        $id = null;
        
        if(array_key_exists('perPage',$_GET)){
            $perPage = $_GET['perPage'];
        }
        if(array_key_exists('page',$_GET)){
            $page = $_GET['page'];
        }
        if(array_key_exists('search',$_GET)){
            $search = $_GET['search'];
        }
        if(array_key_exists('id',$_GET)){
            $id = $_GET['id'];
        }


        if($id != null){
            $designProject = $this->designProject->find($id);
            if(!$designProject){
                return $this->ResponseData(null, 'Get 365Design Project Operation Failed',false, 400,['id'=> 'Not Found']);
            }
            return $this->ResponseData(new DesignProjectResource($designProject), 'Get 365Design Project Operation Success',true, 200);

        }
        else{
            $skip = $perPage * ($page-1);
            if ($search != null) {
                $query = $this->designProject
                    ->orWhere('nameEn', 'LIKE', '%' . $search . '%')
                    ->orWhere('nameAr', 'LIKE', '%' . $search . '%')
                    ->orWhere('ceatedByEn', 'LIKE', '%' . $search . '%')
                    ->orWhere('ceatedByAr', 'LIKE', '%' . $search . '%')
                    ->orWhere('availabilityProgramsEn', 'LIKE', '%' . $search . '%')
                    ->orWhere('availabilityProgramsAr', 'LIKE', '%' . $search . '%')
                    ->orWhere('smallDescriptionEn', 'LIKE', '%' . $search . '%')
                    ->orWhere('smallDescriptionAr', 'LIKE', '%' . $search . '%')
                    ->orWhere('date', 'LIKE', '%' . $search . '%')
                    ->orWhere('state', 'LIKE', '%' . $search . '%')
                    ->orWhere('price', 'LIKE', '%' . $search . '%')
                    ->orWhere('link', 'LIKE', '%' . $search . '%')
                    ->orWhere('category', 'LIKE', '%' . $search . '%');
            } else {
                $query = $this->designProject;

            }

            $designProject = $query->latest()->take($perPage)->skip($skip)->get();
            $designProject_count = $query->count();

            $data = [
                "projcts" => DesignProjectResource::collection($designProject),
                'pagination' => $this->paginate($designProject_count,$perPage,$skip,$page,route('DaysDesign.projets.index'))
            ];
            return $this->ResponseData($data, 'Get All 365Design Projects Operation Success',true, 200);
        }
    }

    public function save(Request $request)
    {
        $designCategory = $this->designCategory->find($request->category);
        if(!$designCategory){
            return $this->ResponseData(null,'Add 365Design Projects Opreation Failed',false,400,['category'=>'Category Not Found']);
        }

        if($request->state == "price" && $request->price == null){
            return $this->ResponseData(null,'Add 365Design Projects Opreation Failed',false,400,['price'=>'Price Field is Required']);
        }

        $request->nameEn == "null" ? $nameEn = null : $nameEn = $request->nameEn; 
        $request->nameAr == "null" ? $nameAr = null : $nameAr = $request->nameAr; 
        $request->ceatedByEn == "null" ? $ceatedByEn = null : $ceatedByEn = $request->ceatedByEn; 
        $request->ceatedByAr == "null" ? $ceatedByAr = null : $ceatedByAr = $request->ceatedByAr; 
        $request->availabilityProgramsEn == "null" ? $availabilityProgramsEn = null : $availabilityProgramsEn = $request->availabilityProgramsEn; 
        $request->availabilityProgramsAr == "null" ? $availabilityProgramsAr = null : $availabilityProgramsAr = $request->availabilityProgramsAr; 
        $request->smallDescriptionEn == "null" ? $smallDescriptionEn = null : $smallDescriptionEn = $request->smallDescriptionEn; 
        $request->smallDescriptionAr == "null" ? $smallDescriptionAr = null : $smallDescriptionAr = $request->smallDescriptionAr; 
        $request->date == "null" ? $date = null : $date = $request->date; 
        $request->state == "null" ? $state = null : $state = $request->state; 
        $request->price == "null" ? $price = null : $price = $request->price; 
        $request->link == "null" ? $link = null : $link = $request->link; 
        $request->category == "null" ? $category = null : $category = $request->category; 
        $request->informationEn == "null" ? $informationEn = null : $informationEn = $request->informationEn; 
        $request->informationAr == "null" ? $informationAr = null : $informationAr = $request->informationAr; 

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



        $Informations_count  = 0 ;
        $Informations = [];
        if($request->has('Informations')){
            $Informations_count   = count($request->Informations);
            $Informations  = $request->Informations;
        }

        $Images_count  = 0 ;
        $Images = [];
        if($request->has('Images')){
            $Images_count   = count($request->Images);
            $Images  = $request->Images;
        }

        $CoverImages_count  = 0 ;
        $CoverImages = [];
        if($request->has('CoverImages')){
            $CoverImages_count   = count($request->CoverImages);
            $CoverImages  = $request->CoverImages;
        }


        $designProject = $this->designProject->find($request->id);
        if(!$designProject){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/365Design/Projects/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/Projects',$imageName);
            }

            

            $seo_facebookImageName = null;
            if(is_file($request->seo_facebookImage)){
                $seo_facebookImageName = 'media/365Design/ProjectsSEO/'.time().'-faceebook-'.$request->seo_facebookImage->getClientOriginalName();
                $request->seo_facebookImage->move('media/365Design/ProjectsSEO',$seo_facebookImageName);
            }


            


            $designProject = $this->designProject->create([
                'image' => $imageName,
                'nameEn' => $nameEn,
                'nameAr' => $nameAr,
                'ceatedByEn' => $ceatedByEn,
                'ceatedByAr' => $ceatedByAr,
                'availabilityProgramsEn' => $availabilityProgramsEn,
                'availabilityProgramsAr' => $availabilityProgramsAr,
                'smallDescriptionEn' => $smallDescriptionEn,
                'smallDescriptionAr' => $smallDescriptionAr,
                'date' => $date,
                'state' => $state,
                'price' => $price,
                'link' => $link,
                'category' => $category,
                'informationEn' => $informationEn,
                'informationAr' => $informationAr,
            ]);
            if($Images_count > 0){
                foreach($Images as $key => $Image){
                    $imageName = null;
                    if(is_file($Image['image'])){
                        $imageName = 'media/365Design/ProductsImages/'.time().'-logo-'.$Image['image']->getClientOriginalName();
                        $Image['image']->move('media/365Design/ProductsImages',$imageName);
                    }

                    $this->designProjectImages->create([
                        'image' => $imageName,
                        'project' => $designProject->id,
                    ]);
                }
            }

            if($CoverImages_count > 0){
                foreach($CoverImages as $key => $Image){
                    $imageName = null;
                    if(is_file($Image['image'])){
                        $imageName = 'media/365Design/ProductsCoverImages/'.time().'-logo-'.$Image['image']->getClientOriginalName();
                        $Image['image']->move('media/365Design/ProductsCoverImages',$imageName);
                    }

                    $this->designProjectCoverImages->create([
                        'image' => $imageName,
                        'project' => $designProject->id,
                    ]);
                }
            }
            if($Informations_count > 0){
                foreach($Informations as $key => $Information){

                    $Information['titleEn'] == "null" ? $titleEn = null : $titleEn = $Information['titleEn']; 
                    $Information['titleAr'] == "null" ? $titleAr = null : $titleAr = $Information['titleAr']; 
                    $Information['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $Information['descriptionEn']; 
                    $Information['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $Information['descriptionAr']; 

                    $this->designProjectInformations->create([
                       'titleEn' => $titleEn,
                       'titleAr' => $titleAr,
                       'descriptionEn' => $descriptionEn,
                       'descriptionAr' => $descriptionAr,
                       'project' => $designProject->id,
                    ]);
                }
            }

            
            $this->designProjectSEO->create([
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
                'project' => $designProject->id
            ]);



        }else{

            $designCategory = $this->designCategory->find($request->category);
            if(!$designCategory){
                return $this->ResponseData(null,'Add 365Design Projects Opreation Failed',false,400,['category'=>'Category Not Found']);
            }

            if($request->state == "price" && $request->price == null){
                return $this->ResponseData(null,'Add 365Design Projects Opreation Failed',false,400,['price'=>'Price Field is Required']);
            }

            if($request->image == null){
                if($designProject->image != null){
                    unlink($designProject->image);
                }
                $imageName = null;
            }else{
                $imageName = $designProject->image;
            }
            
            if(is_file($request->image)){
                if($designProject->image != null){
                    unlink($designProject->image);
                }
                $imageName = 'media/365Design/Projects/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/Projects',$imageName);
            }

            


            $designProject->update([
                'image' => $imageName,
                'nameEn' => $nameEn,
                'nameAr' => $nameAr,
                'ceatedByEn' => $ceatedByEn,
                'ceatedByAr' => $ceatedByAr,
                'availabilityProgramsEn' => $availabilityProgramsEn,
                'availabilityProgramsAr' => $availabilityProgramsAr,
                'smallDescriptionEn' => $smallDescriptionEn,
                'smallDescriptionAr' => $smallDescriptionAr,
                'date' => $date,
                'state' => $state,
                'price' => $price,
                'link' => $link,
                'category' => $category,
                'informationEn' => $informationEn,
                'informationAr' => $informationAr,
            ]);

            
            if($CoverImages_count > 0){
                foreach($CoverImages as $key => $Image){

                    $designProjectCoverImages = $this->designProjectCoverImages->where('project',$designProject->id)->skip($key)->first();
                    if(!$designProjectCoverImages){
                        $imageName = null;
                        if(is_file($Image['image'])){
                            $imageName = 'media/365Design/ProductsCoverImages/'.time().$Image['image']->getClientOriginalName();
                            $Image['image']->move('media/365Design/ProductsCoverImages',$imageName);
                        }

                        $this->designProjectCoverImages->create([
                            'image' => $imageName,
                            'project' => $designProject->id,
                        ]);
                    }else{
                        $imageName = $designProjectCoverImages->image;
                        if(is_file($Image['image'])){
                            if($designProjectCoverImages->image != null){
                                unlink($designProjectCoverImages->image);
                            }
                            $imageName = 'media/365Design/ProductsCoverImages/'.time().$Image['image']->getClientOriginalName();
                            $Image['image']->move('media/365Design/ProductsCoverImages',$imageName);
                        }

                        $designProjectCoverImages->update([
                            'image' => $imageName,
                            'project' => $designProject->id,
                        ]);
                    }

                }
            }
            if($Images_count > 0){
                foreach($Images as $key => $Image){

                    $designProjectImages = $this->designProjectImages->where('project',$designProject->id)->skip($key)->first();
                    if(!$designProjectImages){
                        $imageName = null;
                        if(is_file($Image['image'])){
                            $imageName = 'media/365Design/ProductsImages/'.time().'-logo-'.$Image['image']->getClientOriginalName();
                            $Image['image']->move('media/365Design/ProductsImages',$imageName);
                        }

                        $this->designProjectImages->create([
                            'image' => $imageName,
                            'project' => $designProject->id,
                        ]);
                    }else{
                        $imageName = $designProjectImages->image;
                        if(is_file($Image['image'])){
                            if($designProjectImages->image != null){
                                unlink($designProjectImages->image);
                            }
                            $imageName = 'media/365Design/ProductsImages/'.time().'-logo-'.$Image['image']->getClientOriginalName();
                            $Image['image']->move('media/365Design/ProductsImages',$imageName);
                        }

                        $designProjectImages->update([
                            'image' => $imageName,
                            'project' => $designProject->id,
                        ]);
                    }

                }
            }
            if($Informations_count > 0){
                foreach($Informations as $key => $Information){

                    $designProjectInformations = $this->designProjectInformations->where('project',$designProject->id)->skip($key)->first();

                    $Information['titleEn'] == "null" ? $titleEn = null : $titleEn = $Information['titleEn']; 
                    $Information['titleAr'] == "null" ? $titleAr = null : $titleAr = $Information['titleAr']; 
                    $Information['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $Information['descriptionEn']; 
                    $Information['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $Information['descriptionAr']; 


                    if(!$designProjectInformations){

                        

                        $this->designProjectInformations->create([
                            'titleEn' => $titleEn,
                            'titleAr' => $titleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr,
                            'project' => $designProject->id,
                        ]);
                    }else{
                        $designProjectInformations->update([
                            'titleEn' => $titleEn,
                            'titleAr' => $titleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr,
                            'project' => $designProject->id,
                        ]);
                    }
                }
            }

            $designProjectSEO = $this->designProjectSEO->where('project',$designProject->id)->first();
            if(!$designProjectSEO){
                $seo_facebookImageName = null;
                
                if(is_file($request->seo_facebookImage)){
                    $seo_facebookImageName = 'media/365Design/ProjectsSEO/'.time().'-faceebook-'.$request->seo_facebookImage->getClientOriginalName();
                    $request->seo_facebookImage->move('media/365Design/ProjectsSEO',$seo_facebookImageName);
                }
                $this->designProjectSEO->create([
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
                    'project' => $designProject->id
                ]);
            }




            else{
                

                if($request->seo_facebookImage == "null"){
                    if($designProjectSEO->facebookImage != null){
                        unlink($designProjectSEO->facebookImage);
                    }
                    $seo_facebookImageName = null;
                }else{
                    $seo_facebookImageName = $designProjectSEO->facebookImage;
                }
                if(is_file($request->seo_facebookImage)){
                    if($designProjectSEO->facebookImage != null){
                        unlink($designProjectSEO->facebookImage);
                    }
                    $seo_facebookImageName = 'media/365Design/ProjectsSEO/'.time().'-faceebook-'.$request->seo_facebookImage->getClientOriginalName();
                    $request->seo_facebookImage->move('media/365Design/ProjectsSEO',$seo_facebookImageName);
                }
                $designProjectSEO->update([
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
                    'project' => $designProject->id
                ]);
            }
        }




        return $this->ResponseData(null,'Update Or Add 365Design Add Projects Opreation Success',true,200);


    }

    public function deleteImage(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Project Image Opreation Failed.',false,400);
        }else{
            $designProjectImages = $this->designProjectImages->find($request->id);
            if(!$designProjectImages){
                return $this->ResponseData(null,'Delete 365Design Project Image Opreation Failed',true,400);
            }
            if($designProjectImages->image != null){
                unlink($designProjectImages->image);
            }
            $designProjectImages->delete();
            return $this->ResponseData(null,'Delete 365Design Project Image Opreation Success',true,200);
        }
    }

    public function deleteCoverImage(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Project Cover Image Opreation Failed.',false,400);
        }else{
            $designProjectCoverImages = $this->designProjectCoverImages->find($request->id);
            if(!$designProjectCoverImages){
                return $this->ResponseData(null,'Delete 365Design Project Cover Image Opreation Failed',true,400);
            }
            if($designProjectCoverImages->image != null){
                unlink($designProjectCoverImages->image);
            }
            $designProjectCoverImages->delete();
            return $this->ResponseData(null,'Delete 365Design Project Cover Image Opreation Success',true,200);
        }
    }


    public function deleteInformation(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Project Information Opreation Failed.',false,400);
        }else{
            $designProjectInformations = $this->designProjectInformations->find($request->id);
            if(!$designProjectInformations){
                return $this->ResponseData(null,'Delete 365Design Project Information Opreation Failed',true,400);
            }

            $designProjectInformations->delete();
            return $this->ResponseData(null,'Delete 365Design Project Information Opreation Success',true,200);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Project Opreation Failed.',false,400);
        }else{
            $designProject = $this->designProject->find($request->id);
            if(!$designProject){
                return $this->ResponseData(null,'Delete 365Design Project Opreation Failed',true,400);
            }
            if($designProject->image != null){
                unlink($designProject->image);
            }
            if($designProject->coverImage != null){
                unlink($designProject->coverImage);
            }

            foreach($designProject->Images as $image){
                if($image != null){
                    if($image->image != null){
                        unlink($image->image);
                    }
                }
            }
            if($designProject->SEO != null){
                if($designProject->SEO->facebookImage != null){
                    unlink($designProject->SEO->facebookImage);
                }
            }

            $designProject->delete();
            return $this->ResponseData(null,'Delete 365Design Project Opreation Success',true,200);
        }
    }

}
