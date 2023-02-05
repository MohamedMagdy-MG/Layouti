<?php

namespace App\Models\ContactPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactInformation extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','descriptionEn','descriptionAr','AddressEn','AddressAr','informationTitleEn','informationTitleAr'];
    protected $dates = ['deleted_at'];

    public function CountryCards()
    {
        return $this->hasMany(ContactInformationCountryCard::class,'card','id');
    }
    public function WhatsAppCards()
    {
        return $this->hasMany(ContactInformationWhatsAppCard::class,'card','id');
    }
    public function MobileCards()
    {
        return $this->hasMany(ContactInformationMobileCard::class,'card','id');
    }
    public function EmailCards()
    {
        return $this->hasMany(ContactInformationEmailCard::class,'card','id');
    }
}
