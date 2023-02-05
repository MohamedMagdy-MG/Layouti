<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductTeamMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{
    use Response;

    public $productTeamMember;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productTeamMember = new ProductTeamMembers();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $TeamMemberCards_count   = count($request->cards);
        $TeamMemberCards  = $request->cards;
        $this->addProductTeamMember($TeamMemberCards,$TeamMemberCards_count,$productGeneralInformation->id);

        return $this->ResponseData(null,'Save Project Team Member Operation Success',true,200);


    }

    public function addProductTeamMember($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productTeamMember = $this->productTeamMember->where('project',$project)->skip($key)->first();

                $card['labelEn'] == "null" ?  $labelEn = null : $labelEn = $card['labelEn'];
                $card['labelAr'] == "null" ?  $labelAr = null : $labelAr = $card['labelAr'];
                $card['memberNameEn'] == "null" ?  $memberNameEn = null : $memberNameEn = $card['memberNameEn'];
                $card['memberNameAr'] == "null" ?  $memberNameAr = null : $memberNameAr = $card['memberNameAr'];

                if($productTeamMember != null){
                    $productTeamMember->update([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'memberNameEn' => $memberNameEn,
                        'memberNameAr' => $memberNameAr,
                        'project' => $project
                    ]);
                }
                else{
                    $this->productTeamMember->create([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'memberNameEn' => $memberNameEn,
                        'memberNameAr' => $memberNameAr,
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function DeleteTeamMembers(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Team Members Operation Failed',false,400,$validator->errors());
        }else{
            $productTeamMember = $this->productTeamMember->find($request->id);
            if($productTeamMember == null){
                return $this->ResponseData(null,'Product Team Members Not Found',false,400);
            }
            $productTeamMember->delete();
            return $this->ResponseData(null,'Delete Product Team Members Operation success',true,200);

        }
    }

   
}
