<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUITestimonials;
use App\Models\LearnUI\LearnUITestimonialsCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    use Response;
    public $testimonials;
    public $testimonialsCard;

    public function __construct()
    {
        $this->testimonials = new LearnUITestimonials();
        $this->testimonialsCard = new LearnUITestimonialsCards();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }



        $testimonials = $this->testimonials->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$testimonials){

            $testimonials = $this->testimonials->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/LearnUI/Testimonials/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/LearnUI/Testimonials',$imageName);
                    }

                    $card['nameEn'] != "null" ? $nameEn = $card['nameEn'] : $nameEn = null;
                    $card['nameAr'] != "null" ? $nameAr = $card['nameAr'] : $nameAr = null;
                    $card['jobTitleEn'] != "null" ? $jobTitleEn = $card['jobTitleEn'] : $jobTitleEn = null;
                    $card['jobTitleAr'] != "null" ? $jobTitleAr = $card['jobTitleAr'] : $jobTitleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                    $this->testimonialsCard->create([
                        'nameEn' => $nameEn,
                        'nameAr' => $nameAr,
                        'jobTitleEn' => $jobTitleEn,
                        'jobTitleAr'  => $jobTitleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr ,
                        'image' => $imageName,
                        'card' => $testimonials->id
                    ]);
                }
            }
        }else{

            $testimonials->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $card['nameEn'] != "null" ? $nameEn = $card['nameEn'] : $nameEn = null;
                    $card['nameAr'] != "null" ? $nameAr = $card['nameAr'] : $nameAr = null;
                    $card['jobTitleEn'] != "null" ? $jobTitleEn = $card['jobTitleEn'] : $jobTitleEn = null;
                    $card['jobTitleAr'] != "null" ? $jobTitleAr = $card['jobTitleAr'] : $jobTitleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                    $testimonialsCard = $this->testimonialsCard->skip($key)->first();
                    if($testimonialsCard != null){
                        $card['image'] != "null" ? $imageName = $testimonialsCard->image : $imageName = null;
                        if($imageName == "null"){
                            unlink($testimonialsCard->image);
                        }
                        if(is_file($card['image'])){
                            if($imageName != null){
                                unlink($imageName);
                            }
                            $imageName = 'media/LearnUI/Testimonials/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/LearnUI/Testimonials',$imageName);
                        }
                        $testimonialsCard->update([
                            'nameEn' => $nameEn,
                            'nameAr' => $nameAr,
                            'jobTitleEn' => $jobTitleEn,
                            'jobTitleAr'  => $jobTitleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $testimonials->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){
                            $imageName = 'media/LearnUI/Testimonials/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/LearnUI/Testimonials',$imageName);
                        }
                        $this->testimonialsCard->create([
                            'nameEn' => $nameEn,
                            'nameAr' => $nameAr,
                            'jobTitleEn' => $jobTitleEn,
                            'jobTitleAr'  => $jobTitleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $testimonials->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI Testimonials Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI Testimonials Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $testimonialsCard = $this->testimonialsCard->find($request->id);
            if(!$testimonialsCard){
                return $this->ResponseData(null,'Delete LearnUI Testimonials Card Opreation Failed',true,400);
            }

            if(is_file($testimonialsCard->image)){
                if($testimonialsCard->image != null){
                    unlink($testimonialsCard->image);
                }
            }
            $testimonialsCard->delete();
            return $this->ResponseData(null,'Delete LearnUI Testimonials Card Opreation Success',true,200);


        }
    }
}
