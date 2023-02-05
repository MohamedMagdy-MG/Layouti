<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignCoursesResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignCoverLetterResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignEducationResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignExperiencesResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignHeaderContentResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignInterestsResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignLanguagesResource;
use App\Http\Resources\Dashboard\DaysDesign\CvDesignSkillsResource;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignCourses;
use App\Models\DaysDesign\CvDesignCoverLetter;
use App\Models\DaysDesign\CvDesignEducation;
use App\Models\DaysDesign\CvDesignExperiences;
use App\Models\DaysDesign\CvDesignHeaderContent;
use App\Models\DaysDesign\CvDesignInterests;
use App\Models\DaysDesign\CvDesignLanguages;
use App\Models\DaysDesign\CvDesignSkills;
use Illuminate\Http\Request;

class CvDesignHomeController extends Controller
{
    use Response;

    public $cvDesignHeaderContent;
    public $cvDesignCoverLetter;
    public $cvDesignExperiences;
    public $cvDesignEducation;
    public $cvDesignCourses;
    public $cvDesignLanguages;
    public $cvDesignSkills;
    public $cvDesignInterests;

    public function __construct()
    {
        $this->cvDesignHeaderContent = new CvDesignHeaderContent();
        $this->cvDesignCoverLetter = new CvDesignCoverLetter();
        $this->cvDesignExperiences = new CvDesignExperiences();
        $this->cvDesignEducation = new CvDesignEducation();
        $this->cvDesignCourses = new CvDesignCourses();
        $this->cvDesignLanguages = new CvDesignLanguages();
        $this->cvDesignSkills = new CvDesignSkills();
        $this->cvDesignInterests = new CvDesignInterests();
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'headerContent' => new CvDesignHeaderContentResource($this->cvDesignHeaderContent->first()??''),
            'coverLetter' => new CvDesignCoverLetterResource($this->cvDesignCoverLetter->first()??''),
            'experiences' => CvDesignExperiencesResource::collection($this->cvDesignExperiences->get()),
            'education' => CvDesignEducationResource::collection($this->cvDesignEducation->get()),
            'courses' => CvDesignCoursesResource::collection($this->cvDesignCourses->get()),
            'languages' => CvDesignLanguagesResource::collection($this->cvDesignLanguages->get()),
            'skills' => CvDesignSkillsResource::collection($this->cvDesignSkills->get()),
            'interests' => CvDesignInterestsResource::collection($this->cvDesignInterests->get()),

        ];

        return $this->ResponseData($data,'get 365Design CV Home Page Data Success',true,200);
    }
}
