<?php

namespace App\Models\EToy\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageHeaderContent extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['color','titleOneEn','titleOneAr','titleTwoEn','titleTwoAr','titleThreeEn',
    'titleThreeAr','availabilityTitleEn','availabilityTitleAr','availabilityIOSIcon','availabilityIOSLink',
    'availabilityAndroidIcon','availabilityAndroidLink','topLeftImage','topRightImage','bottomLeftImage',
    'bottomRightImage','bottomImage'];

}
