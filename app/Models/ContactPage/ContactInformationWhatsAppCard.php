<?php

namespace App\Models\ContactPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactInformationWhatsAppCard extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['titleEn','titleAr','whatsApp','card'];
    protected $dates = ['deleted_at'];
}


