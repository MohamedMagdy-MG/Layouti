<?php

namespace App\Http\Resources\Frontend\Avatar\Female;

use App\Http\Resources\Dashboard\Configurations\CountriesResource;
use App\Http\Resources\Frontend\Avatar\AvatarsAddressResource;
use App\Http\Resources\Frontend\Avatar\AvatarsPositionsResource;
use App\Models\Avatars\AvatarsAddress;
use App\Models\Avatars\AvatarsFemalePictures;
use App\Models\Avatars\AvatarsPositions;
use App\Models\Configurations\Countries;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsFemaleNamesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function BirthDate()
    {
        $min = strtotime("47 years ago");
        $max = strtotime("25 years ago");

        $rand_time = mt_rand($min, $max);

        $birth_date = date('d/m/Y', $rand_time);

        return $birth_date;
    }

    public function Age($birth_date)
    {
        $date = date_create_from_format('d/m/Y', $birth_date);
        $BirthData = date_format($date, 'Y-m-d');
        return Carbon::parse($BirthData)->age .' years';
    }

    public function Email($fnameEn,$lnameEn)
    {
        $format = ['@yahoo.com' , '@hotmail.com' , '@gmail.com'];
        $email = $fnameEn.'.'.$lnameEn.$format[array_rand($format)];
        return $email;
    }
    public function toArray($request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        $BirthData = $this->BirthDate();
        return [
            'fname' => $language == 'ar' ? $this->fnameAr : $this->fnameEn,
            'lname' => $language == 'ar' ? $this->lnameAr : $this->lnameEn,
            'gender' => $this->gender,
            'Country' => new CountriesResource(Countries::inRandomOrder()->first()),
            'Email' => $this->Email($this->fnameEn,$this->lnameEn),
            'BirthData' => $BirthData,
            'Age' => $this->Age($BirthData),
            'Avatar' => new AvatarsFemalePicturesResource(AvatarsFemalePictures::inRandomOrder()->first()),
            'Address' => new AvatarsAddressResource(AvatarsAddress::inRandomOrder()->first()),
            'Position' => new AvatarsPositionsResource(AvatarsPositions::inRandomOrder()->first())
        ];
    }
}
