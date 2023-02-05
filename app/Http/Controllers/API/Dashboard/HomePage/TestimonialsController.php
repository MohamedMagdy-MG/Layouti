<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\HomePage\Testimonials;
use App\Models\HomePage\Testimonials_Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    use Response;
    public $testimonials;
    public $testimonialsCard;

    public function __construct()
    {
        $this->testimonials = new Testimonials();
        $this->testimonialsCard = new Testimonials_Cards();
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
                        $imageName = 'media/HomePage/Testimonials/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/HomePage/Testimonials',$imageName);
                    }

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;
                    $card['jobTitleEn'] != "null" ? $jobTitleEn = $card['jobTitleEn'] : $jobTitleEn = null;
                    $card['jobTitleAr'] != "null" ? $jobTitleAr = $card['jobTitleAr'] : $jobTitleAr = null;
                    
                    $this->testimonialsCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'jobTitleEn' => $jobTitleEn,
                        'jobTitleAr'  => $jobTitleAr,
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


                    $testimonialsCard = $this->testimonialsCard->skip($key)->first();

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;
                    $card['jobTitleEn'] != "null" ? $jobTitleEn = $card['jobTitleEn'] : $jobTitleEn = null;
                    $card['jobTitleAr'] != "null" ? $jobTitleAr = $card['jobTitleAr'] : $jobTitleAr = null;

                    if($testimonialsCard != null){

                        if($card['image'] == "null"){
                            $imageName = null;
                            if($testimonialsCard->image != null){
                                unlink($testimonialsCard->image);
                            }
                        }else{
                            $imageName = $testimonialsCard->image;
                            if(is_file($card['image'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/HomePage/Testimonials/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/HomePage/Testimonials',$imageName);
                            }
                        }
                        
                        $testimonialsCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'jobTitleEn' => $jobTitleEn,
                            'jobTitleAr'  => $jobTitleAr,
                            'image' => $imageName,
                            'card' => $testimonials->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){
                            $imageName = 'media/HomePage/Testimonials/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/HomePage/Testimonials',$imageName);
                        }
                        $this->testimonialsCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'jobTitleEn' => $jobTitleEn,
                            'jobTitleAr'  => $jobTitleAr,
                            'image' => $imageName,
                            'card' => $testimonials->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Testimonials Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        return $request;
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Testimonials Card Opreation Failed.',false,400);
        }else{
            $testimonialsCard = $this->testimonialsCard->find($request->id);
            if(!$testimonialsCard){
                return $this->ResponseData(null,'Delete Testimonials Card Opreation Failed',true,400);
            }

            if(is_file($testimonialsCard->image)){
                if($testimonialsCard->image != null){
                    unlink($testimonialsCard->image);
                }
            }
            $testimonialsCard->delete();
            return $this->ResponseData(null,'Delete Testimonials Card Opreation Success',true,200);


        }
    }
}
