<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login','Auth\AuthController@Login');
Route::post('dveloperLogin','Auth\AuthController@DeveloperLogin');
Route::post('logout','Auth\AuthController@Logout');

Route::prefix('homePage')->group(function(){
    Route::get('/','HomePage\HomeController@index');
    Route::post('headerContent','HomePage\HeaderContentController@save');
    Route::post('/whatWeWillServe','HomePage\WhatWeWillServeController@save');
    Route::post('/whatWeWillServe/deleteCard','HomePage\WhatWeWillServeController@delete');
    Route::post('/ourLastWork','HomePage\OurLastWorkController@save');
    Route::post('/processDesignSkills','HomePage\ProcessDesignSkillsController@save');
    Route::post('/processDesignSkills/deleteCard','HomePage\ProcessDesignSkillsController@delete');
    Route::post('/testimonials','HomePage\TestimonialsController@save');
    Route::post('/testimonials/deleteCard','HomePage\TestimonialsController@delete');
    Route::post('/things','HomePage\ThingsController@save');
    Route::get('/things/cards','HomePage\ThingsController@ThingsOpportunityAlwaysExists');
    Route::post('/needLayoutiForYourProject','HomePage\NeedLayoutiForYourProjectController@save');
    Route::post('/needLayoutiForYourProject/deleteCard','HomePage\NeedLayoutiForYourProjectController@delete');


});
Route::prefix('workPage')->group(function(){
    Route::get('/','WorkPage\HomeController@index');
    Route::post('headerContent','WorkPage\HeaderContentController@save');
    Route::post('workWeFiredUpInnovated','WorkPage\WorkWeFiredUpInnovatedController@save');

});

Route::prefix('uiAvatar')->group(function(){
    
    Route::prefix('pages')->group(function(){
        Route::post('contentGenerator','Avatars\ContentGeneratorPageController@save');
        Route::post('uiGenerator','Avatars\UiGeneratorPageController@save');
        Route::get('/uiGeneratorStaticPage','Avatars\AvatarsHomeController@HomeUIGenerator');
        Route::get('/contentGeneratorStaticPage','Avatars\AvatarsHomeController@HomeContentGenerator');
        Route::get('contentGenerator','Avatars\AvatarsHomeController@ContentGenerator');
        Route::get('uiGenerator','Avatars\AvatarsHomeController@UIGenerator');
    });
    Route::prefix('uiGenerator')->group(function(){
        Route::prefix('address')->group(function(){
            Route::post('/import','Avatars\UiGeneratorController@importAddress');
            Route::post('/edit','Avatars\UiGeneratorController@editAddress');
            Route::post('/delete','Avatars\UiGeneratorController@deleteAddress');
            Route::post('/delete/all','Avatars\UiGeneratorController@deleteAllAddress');
        });
        Route::prefix('positions')->group(function(){
            Route::post('/import','Avatars\UiGeneratorController@importPositions');
            Route::post('/edit','Avatars\UiGeneratorController@editPositions');
            Route::post('/delete','Avatars\UiGeneratorController@deletePositions');
            Route::post('/delete/all','Avatars\UiGeneratorController@deleteAllPositions');
        });
        Route::prefix('maleNames')->group(function(){
            Route::post('/import','Avatars\UiGeneratorController@importMaleNames');
            Route::post('/edit','Avatars\UiGeneratorController@editMaleNames');
            Route::post('/delete','Avatars\UiGeneratorController@deleteMaleNames');
            Route::post('/delete/all','Avatars\UiGeneratorController@deleteAllMaleNames');
        });
        Route::prefix('femaleNames')->group(function(){
            Route::post('/import','Avatars\UiGeneratorController@importFemaleNames');
            Route::post('/edit','Avatars\UiGeneratorController@editFemaleNames');
            Route::post('/delete','Avatars\UiGeneratorController@deleteFemaleNames');
            Route::post('/delete/all','Avatars\UiGeneratorController@deleteAllFemaleNames');
        });
        Route::prefix('femaleImages')->group(function(){
            Route::post('/import','Avatars\UiGeneratorController@addFemaleImages');
            Route::post('/edit','Avatars\UiGeneratorController@editFemaleImages');
            Route::post('/delete','Avatars\UiGeneratorController@deleteFemaleImages');
            Route::post('/delete/all','Avatars\UiGeneratorController@deleteAllFemaleImages');
        });
        Route::prefix('maleImages')->group(function(){
            Route::post('/import','Avatars\UiGeneratorController@addMaleImages');
            Route::post('/edit','Avatars\UiGeneratorController@editMaleImages');
            Route::post('/delete','Avatars\UiGeneratorController@deleteMaleImages');
            Route::post('/delete/all','Avatars\UiGeneratorController@deleteAllMaleImages');
        });
    
    });
    Route::prefix('contentGenerator')->group(function(){
        Route::prefix('title')->group(function(){
            Route::post('/import','Avatars\ContentGeneratorController@importTitle');
            Route::post('/edit','Avatars\ContentGeneratorController@editTitle');
            Route::post('/delete','Avatars\ContentGeneratorController@deleteTitle');
            Route::post('/delete/all','Avatars\ContentGeneratorController@deleteAllTitle');
        });
        Route::prefix('paragraph')->group(function(){
            Route::post('/import','Avatars\ContentGeneratorController@importParagraph');
            Route::post('/edit','Avatars\ContentGeneratorController@editParagraph');
            Route::post('/delete','Avatars\ContentGeneratorController@deleteParagraph');
            Route::post('/delete/all','Avatars\ContentGeneratorController@deleteAllParagraph');
        });
        Route::prefix('images')->group(function(){
            Route::post('/import','Avatars\ContentGeneratorController@addImages');
            Route::post('/edit','Avatars\ContentGeneratorController@editImages');
            Route::post('/delete','Avatars\ContentGeneratorController@deleteImages');
            Route::post('/delete/all','Avatars\ContentGeneratorController@deleteAllImages');
        });
    });

});


Route::prefix('aboutPage')->group(function(){
    Route::get('/','AboutPage\HomeController@index');
    Route::post('headerContent','AboutPage\HeaderContentController@save');
    Route::post('learnAboutLayouti','AboutPage\LearnAboutLayoutiController@save');
    Route::post('team','AboutPage\LearnTeamController@save');
    Route::post('team/deleteCard','AboutPage\LearnTeamController@delete');
    Route::post('troughAboutLayouti','AboutPage\LearnTroughAboutLayoutiController@save');
    Route::post('troughAboutLayouti/deleteCard','AboutPage\LearnTroughAboutLayoutiController@delete');
    Route::post('checkOutOurClients','AboutPage\LearnCheckOutOurClientsController@save');
    Route::post('checkOutOurClients/deleteCard','AboutPage\LearnCheckOutOurClientsController@delete');

});


Route::prefix('servicesPage')->group(function(){
    Route::get('/','ServicesPage\HomeController@index');
    Route::post('headerContent','ServicesPage\HeaderContentController@save');
    Route::post('learnAboutLayouti','ServicesPage\LearnAboutLayoutiController@save');
    Route::post('processTimeline','ServicesPage\ProcessTimelineController@save');
    Route::post('processTimeline/deleteCard','ServicesPage\ProcessTimelineController@delete');
    Route::post('categories','ServicesPage\ServicesCategoriesController@save');
    Route::post('categories/deleteCard','ServicesPage\ServicesCategoriesController@delete');

});

Route::prefix('thingsPage')->group(function(){
    Route::get('/','ThingsPage\HomeController@index');
    Route::post('headerContent','ThingsPage\HeaderContentController@save');
    Route::post('OpportunityAlwaysExists','ThingsPage\OpportunityAlwaysExistsController@save');
    Route::post('OpportunityAlwaysExists/deleteCard','ThingsPage\OpportunityAlwaysExistsController@delete');


});

Route::prefix('contactPage')->group(function(){
    Route::get('/','ContactPage\HomeController@index');
    Route::post('headerContent','ContactPage\ContactHeaderContentController@save');
    Route::post('contactWeFiredUpInnovated','ContactPage\ContactWeFiredUpInnovatedController@save');
    Route::post('information','ContactPage\ContactInformationController@save');
    Route::post('information/deleteMobileCard','ContactPage\ContactInformationController@deleteMobile');
    Route::post('information/deleteEmailCard','ContactPage\ContactInformationController@deleteEmail');
    Route::post('information/deleteWhatsAppCard','ContactPage\ContactInformationController@deleteWhatsApp');
    Route::post('information/deleteCountryCard','ContactPage\ContactInformationController@deleteCountry');
    Route::post('companyDeck','ContactPage\ContactCompanyDeckController@save');
    Route::post('FAQs','ContactPage\ContactFAQsController@save');
    Route::post('FAQs/deleteCard','ContactPage\ContactFAQsController@delete');

});


Route::prefix('sayHello')->name('sayHello.')->group(function(){
    Route::get('/','SayHelloController@index')->name('index');
    Route::post('/delete','SayHelloController@delete');

});

Route::prefix('hireUs')->name('hireUs.')->group(function(){
    Route::get('/','HireUsController@index')->name('index');
    Route::post('/delete','HireUsController@delete');

});

Route::prefix('product')->name('product.')->group(function(){
    Route::get('/','ProductController@index')->name('index');
    Route::post('/arrange','ProductController@arrange');
    Route::post('/find','ProductController@find');

    Route::prefix('generalInformation')->group(function(){
        Route::post('/save','LayoutiProducts\GeneralInformationController@save');
        Route::post('/show','LayoutiProducts\GeneralInformationController@showProduct');
    });

    Route::prefix('projectName')->group(function(){
        Route::post('/save','LayoutiProducts\ProjectInformationController@save');
    });

    Route::prefix('projectInformation')->group(function(){
        Route::post('/save','LayoutiProducts\ProjectNameController@save');
        Route::post('/delete','LayoutiProducts\ProjectNameController@DeleteProjctName');
    });

    Route::prefix('teamMember')->group(function(){
        Route::post('/save','LayoutiProducts\TeamMemberController@save');
        Route::post('/delete','LayoutiProducts\TeamMemberController@DeleteTeamMembers');
    });

    Route::prefix('inDepth')->group(function(){
        Route::post('/save','LayoutiProducts\InDepthController@save');
        Route::post('/deleteCard','LayoutiProducts\InDepthController@DeleteInDepthCard');
    });

    Route::prefix('scopeOfWork')->group(function(){
        Route::post('/save','LayoutiProducts\ScopeOfWorkController@save');
    });

    Route::prefix('ourClients')->group(function(){
        Route::post('/save','LayoutiProducts\OurClientsController@save');
    });

    Route::prefix('branding')->group(function(){
        Route::post('/save','LayoutiProducts\BrandingController@save');
        Route::post('/deleteCard','LayoutiProducts\BrandingController@DeleteProductBodyBranding');
        Route::post('/deleteImage','LayoutiProducts\BrandingController@DeleteProductBodyBrandingImage');
    });

    Route::prefix('designapp')->group(function(){
        Route::post('/save','LayoutiProducts\DesignAppController@save');
        Route::post('/deleteDesignAppProjectInfo','LayoutiProducts\DesignAppController@DeleteDesignAppProjectInfo');
        Route::post('/deleteDesignAppChallengesCards','LayoutiProducts\DesignAppController@DeleteDesignAppChallengesCards');
        Route::post('/deleteDesignAppSections','LayoutiProducts\DesignAppController@DeleteDesignAppSections');
        Route::post('/deleteDesignAppPersona','LayoutiProducts\DesignAppController@DeleteDesignAppPersona');
        Route::post('/deleteDesignAppSectionsTwo','LayoutiProducts\DesignAppController@DeleteDesignAppSectionsTwo');
        Route::post('/deleteDesignAppMobileAppsCards','LayoutiProducts\DesignAppController@DeleteDesignAppMobileAppsCards');
        Route::post('/deleteDesignAppResults','LayoutiProducts\DesignAppController@DeleteDesignAppResults');
    });


    Route::prefix('thanksSection')->group(function(){
        Route::post('/save','LayoutiProducts\ThanksSectionController@save');
        Route::post('/deleteCard','LayoutiProducts\ThanksSectionController@DeleteProductThanksSectionCard');
    });

    Route::prefix('seo')->group(function(){
        Route::post('/save','LayoutiProducts\SEOController@save');
    });





    Route::post('/add','ProductController@addproductGeneralInformation');
    Route::post('/delete','ProductController@DeleteProduct');
    Route::post('/deleteProjctName','ProductController@DeleteProjctName');
    Route::post('/deleteTeamMembers','ProductController@DeleteTeamMembers');
    Route::post('/deleteInDepthCard','ProductController@DeleteInDepthCard');
    Route::post('/deleteDesignAppIntorducingPoints','ProductController@DeleteDesignAppIntorducingPoints');
    Route::post('/deleteDesignAppProjectInfo','ProductController@DeleteDesignAppProjectInfo');
    Route::post('/deleteDesignAppChallengesCards','ProductController@DeleteDesignAppChallengesCards');
    Route::post('/deleteDesignAppSections','ProductController@DeleteDesignAppSections');
    Route::post('/deleteDesignAppPersona','ProductController@DeleteDesignAppPersona');
    Route::post('/deleteDesignAppSectionsTwo','ProductController@DeleteDesignAppSectionsTwo');
    Route::post('/deleteDesignAppMobileAppsCards','ProductController@DeleteDesignAppMobileAppsCards');
    Route::post('/deleteDesignAppResults','ProductController@DeleteDesignAppResults');
    Route::post('/deleteProductBodyBranding','ProductController@DeleteProductBodyBranding');
    Route::post('/deleteProductBodyBrandingImage','ProductController@DeleteProductBodyBrandingImage');
    Route::post('/deleteProductThanksSectionCard','ProductController@DeleteProductThanksSectionCard');

});



Route::prefix('learnUi')->group(function(){
    Route::get('/','LearnUi\HomeController@index');
    Route::post('headerContent','LearnUi\HeaderContentController@save');
    Route::post('whoCanAttend','LearnUi\WhoCanAttendController@save');
    Route::post('whoCanAttend/deletePoint','LearnUi\WhoCanAttendController@delete');
    Route::post('whatOffer','LearnUi\WhatOfferController@save');
    Route::post('whatOffer/deletePoint','LearnUi\WhatOfferController@delete');
    Route::post('highlitsDesign','LearnUi\HighlitsDesignController@save');
    Route::post('testimonials','LearnUi\TestimonialsController@save');
    Route::post('testimonials/deleteCard','LearnUi\TestimonialsController@delete');
    Route::post('uiDesignPackage','LearnUi\UIDesignPackageController@save');
    Route::post('uiDesignPackage/deletePoint','LearnUi\UIDesignPackageController@delete');
    Route::post('uxDesignPackage','LearnUi\UXDesignPackageController@save');
    Route::post('uxDesignPackage/deletePoint','LearnUi\UXDesignPackageController@delete');
    Route::post('uxUIDesignPackage','LearnUi\UXUIDesignPackageController@save');
    Route::post('uxUIDesignPackage/deletePoint','LearnUi\UXUIDesignPackageController@delete');
    Route::post('stepsReachCards','LearnUi\StepsReachCardsController@save');
    Route::post('stepsReachCards/deleteCard','LearnUi\StepsReachCardsController@delete');
    Route::post('questionsCollapse','LearnUi\QuestionsCollapseController@save');
    Route::post('questionsCollapse/deleteCard','LearnUi\QuestionsCollapseController@delete');

    Route::get('highlitsDesign/projects','LearnUi\HighlitsDesignController@index');

    Route::prefix('reservation')->name('reservation.')->group(function(){
        Route::get('/','LearnUi\LeranUiRegisterController@index')->name('index');
        Route::post('/delete','LearnUi\LeranUiRegisterController@delete');
    
    });



});

Route::prefix('365Design')->name('DaysDesign.')->group(function(){
    Route::get('/','DaysDesign\HomeController@index');

    Route::prefix('category')->group(function(){
        Route::get('/','DaysDesign\DesignCategoryController@All');
        Route::post('/arrange','DaysDesign\DesignCategoryController@arrange');
        Route::post('/add','DaysDesign\DesignCategoryController@Add');
        Route::post('/update','DaysDesign\DesignCategoryController@Update');
        Route::post('/delete','DaysDesign\DesignCategoryController@Delete');
    });

    Route::prefix('projets')->name('projets.')->group(function(){
        Route::get('/','DaysDesign\DesignProductsController@index')->name('index');
        Route::post('/add','DaysDesign\DesignProductsController@save');
        Route::post('/deleteImage','DaysDesign\DesignProductsController@deleteImage');
        Route::post('/deleteCoverImage','DaysDesign\DesignProductsController@deleteCoverImage');
        Route::post('/deleteInformation','DaysDesign\DesignProductsController@deleteInformation');
        Route::post('/delete','DaysDesign\DesignProductsController@delete');
    });

    Route::post('headerContent','DaysDesign\DesignHeaderContentController@save');
    Route::post('links','DaysDesign\DesignLinksController@save');
    Route::post('links/deleteCard','DaysDesign\DesignLinksController@deleteCard');
    Route::post('productsStatic','DaysDesign\DesignProductsStaticController@save');
    Route::post('productsStatic/deleteCardOfCard','DaysDesign\DesignProductsStaticController@deleteCardOfCard');
    Route::post('productsStatic/deleteCard','DaysDesign\DesignProductsStaticController@deleteCard');

    Route::prefix('cv')->group(function(){
        Route::get('/','DaysDesign\CvDesignHomeController@index');
        Route::post('/headerContent','DaysDesign\CvDesignHeaderContentController@save');
        Route::post('/coverLetter','DaysDesign\CvDesignCoverLetterController@save');
        Route::post('/experiences','DaysDesign\cvDesignExperiencesController@save');
        Route::post('/education','DaysDesign\CvDesignEducationController@save');
        Route::post('/courses','DaysDesign\CvDesignCoursesController@save');
        Route::post('/languages','DaysDesign\CvDesignLanguagesController@save');
        Route::post('/skills','DaysDesign\CvDesignSkillsController@save');
        Route::post('/interests','DaysDesign\CvDesignInterestsController@save');
    });


});

Route::prefix('blog')->group(function(){

    Route::prefix('category')->group(function(){
        Route::get('/','Blog\BlogCategoryController@All');
        Route::post('/arrange','Blog\BlogCategoryController@arrange');
        Route::post('/add','Blog\BlogCategoryController@Add');
        Route::post('/update','Blog\BlogCategoryController@Update');
        Route::post('/delete','Blog\BlogCategoryController@Delete');
    });

    Route::prefix('author')->group(function(){
        Route::get('/','Blog\BlogAuthorController@All');
        Route::post('/add','Blog\BlogAuthorController@Add');
        Route::post('/update','Blog\BlogAuthorController@Update');
        Route::post('/delete','Blog\BlogAuthorController@Delete');
    });

    Route::get('/','Blog\BlogController@index');
    Route::post('/add','Blog\BlogController@save');
    Route::post('/deleteImage','Blog\BlogController@deleteImage');
    Route::post('/deleteParagraphImage','Blog\BlogController@deleteParagraphImage');
    Route::post('/deleteParagraph','Blog\BlogController@deleteParagraph');
    Route::post('/delete','Blog\BlogController@delete');



});

Route::prefix('resources')->name('resources.')->group(function(){
    
    Route::get('/','Resources\HeaderContentController@index');
    Route::post('/headerContent','Resources\HeaderContentController@save');
    Route::get('/footerContent','Resources\FooterContentController@index');
    Route::post('/footerContent/save','Resources\FooterContentController@save');

    Route::prefix('innerPage')->name('innerPage.')->group(function(){
        Route::get('/categories','Resources\InnerPageController@Categories');
        Route::get('/newCategories','Resources\InnerPageController@NewCategories');
        Route::get('/','Resources\InnerPageController@All')->name('index');
        Route::get('/pending','Resources\InnerPageController@AllPending')->name('pending');
        Route::post('/addPending','Resources\InnerPageController@AddPending');
        Route::post('/findPending','Resources\InnerPageController@findPending');
        Route::post('/deletePending','Resources\InnerPageController@DeletePending');
        Route::post('/add','Resources\InnerPageController@add');
        Route::post('/find','Resources\InnerPageController@find');
        Route::post('/update','Resources\InnerPageController@update');
        Route::post('/delete','Resources\InnerPageController@delete');

    });

});


Route::prefix('etoy')->group(function(){

    Route::get('/contact','EToy\ContactUsController@index')->name('contactUs.index');
    Route::post('/contact/delete','EToy\ContactUsController@delete');

    Route::prefix('homePage')->group(function(){
        Route::get('/','EToy\HomePage\HomePageController@index');
        Route::post('/headerContent','EToy\HomePage\HomePageHeaderContentController@save');
        Route::post('/sectionOne','EToy\HomePage\HomePageSectionOneController@save');
        Route::post('/sectionOne/delete','EToy\HomePage\HomePageSectionOneController@delete');
        Route::post('/sectionTwo','EToy\HomePage\HomePageSectionTwoController@save');
        Route::post('/sectionThree','EToy\HomePage\HomePageSectionThreeController@save');
        Route::post('/sectionFour','EToy\HomePage\HomePageSectionFourController@save');
        Route::post('/seo','EToy\HomePage\HomePageSeoController@save');
    });

    Route::prefix('aboutPage')->group(function(){
        Route::get('/','EToy\AboutPage\AboutPageController@index');
        Route::post('/headerContent','EToy\AboutPage\AboutPageHeaderContentController@save');
        Route::post('/sectionOne','EToy\AboutPage\AboutPageSectionOneController@save');
        Route::post('/sectionTwo','EToy\AboutPage\AboutPageSectionTwoController@save');
        Route::post('/sectionTwo/delete','EToy\AboutPage\AboutPageSectionTwoController@delete');
        Route::post('/seo','EToy\AboutPage\AboutPageSeoController@save');
    });

    Route::prefix('termsAndConditions')->group(function(){
        Route::get('/','EToy\TermsAndConditionsPage\TermsAndConditionsPageController@index');
        Route::post('/headerContent','EToy\TermsAndConditionsPage\TermsAndConditionsPageHeaderContentController@save');
        Route::post('/headerContent/delete','EToy\TermsAndConditionsPage\TermsAndConditionsPageHeaderContentController@delete');
        Route::post('/howToEarnPoints','EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPointsController@save');
        Route::post('/howToEarnPoints/delete','EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPointsController@delete');
        Route::post('/howToEarnPoints/deleteCard','EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPointsController@deleteCard');
        Route::post('/photoGuidelines','EToy\TermsAndConditionsPage\TermsAndConditionsPagePhotoGuidelinesController@save');
        Route::post('/photoGuidelines/delete','EToy\TermsAndConditionsPage\TermsAndConditionsPagePhotoGuidelinesController@delete');
        Route::post('/pointsPolicy','EToy\TermsAndConditionsPage\TermsAndConditionsPagePointsPolicyController@save');
        Route::post('/pointsPolicy/delete','EToy\TermsAndConditionsPage\TermsAndConditionsPagePointsPolicyController@delete');
        Route::post('/registration','EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistrationController@save');
        Route::post('/registration/delete','EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistrationController@delete');
        Route::post('/registration/deleteCard','EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistrationController@deleteCard');
        Route::post('/termsOfUse','EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUseController@save');
        Route::post('/termsOfUse/delete','EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUseController@delete');
        Route::post('/termsOfUse/deleteCard','EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUseController@deleteCard');
        Route::post('/seo','EToy\TermsAndConditionsPage\TermsAndConditionsPageSeoController@save');
    });

    Route::prefix('contactUs')->group(function(){
        Route::get('/','EToy\ContactUsPage\ContactUsPageController@index');
        Route::post('/headerContent','EToy\ContactUsPage\ContactUsPageHeaderContentController@save');
        Route::post('/sectionOne','EToy\ContactUsPage\ContactUsPageSectionOneController@save');
        Route::post('/sectionTwo','EToy\ContactUsPage\ContactUsPageSectionTwoController@save');
        Route::post('/sectionTwo/delete','EToy\ContactUsPage\ContactUsPageSectionTwoController@delete');
        Route::post('/seo','EToy\ContactUsPage\ContactUsPageSeoController@save');

    });

    Route::prefix('global')->group(function(){
        Route::get('/','EToy\GlobalPage\GlobalPageController@index');
        Route::post('/appSetting','EToy\GlobalPage\GlobalPageEtoyAppSettingController@save');
        Route::post('/appFaq','EToy\GlobalPage\GlobalPageEtoyAppFaqController@save');
        Route::post('/appFaq/delete','EToy\GlobalPage\GlobalPageEtoyAppFaqController@delete');
        Route::post('/appAds','EToy\GlobalPage\GlobalPageEtoyAppAdsController@save');

    });


});





Route::prefix('configurations')->group(function(){
    Route::get('/','Configurations\ConfigurationController@index');

    Route::prefix('layoutiCategories')->group(function(){
        Route::get('/','Configurations\LayoutiCategoriesController@All');
        Route::post('/arrange','Configurations\LayoutiCategoriesController@arrange');
        Route::post('/add','Configurations\LayoutiCategoriesController@add');
        Route::post('/update','Configurations\LayoutiCategoriesController@update');
        Route::post('/delete','Configurations\LayoutiCategoriesController@delete');

    });

    Route::prefix('resourceCategories')->group(function(){
        Route::get('/','Configurations\ResourcesCategoryController@All');
        Route::post('/arrange','Configurations\ResourcesCategoryController@arrange');
        Route::post('/add','Configurations\ResourcesCategoryController@add');
        Route::post('/update','Configurations\ResourcesCategoryController@update');
        Route::post('/delete','Configurations\ResourcesCategoryController@delete');

    });

    Route::prefix('resourceTags')->group(function(){
        Route::get('/','Configurations\ResourcesTagesController@All');
        Route::post('/arrange','Configurations\ResourcesTagesController@arrange');
        Route::post('/add','Configurations\ResourcesTagesController@add');
        Route::post('/update','Configurations\ResourcesTagesController@update');
        Route::post('/delete','Configurations\ResourcesTagesController@delete');

    });
    Route::prefix('dashboardSetting')->group(function(){
        Route::get('/','Configurations\DashboardSettingController@index');
        Route::post('/save','Configurations\DashboardSettingController@Save');

    });

    Route::prefix('resourceSubCategories')->group(function(){
        Route::get('/','Configurations\ResourcesSubCategoryController@All');
        Route::post('/arrange','Configurations\ResourcesSubCategoryController@arrange');
        Route::post('/add','Configurations\ResourcesSubCategoryController@add');
        Route::post('/update','Configurations\ResourcesSubCategoryController@update');
        Route::post('/delete','Configurations\ResourcesSubCategoryController@delete');

    });

    Route::prefix('layoutiCountries')->group(function(){
        Route::get('/','Configurations\CountriesController@All')->name('countries.index');
        Route::post('/add','Configurations\CountriesController@add');
        Route::post('/update','Configurations\CountriesController@update');
        Route::post('/delete','Configurations\CountriesController@delete');

    });

    Route::prefix('layoutiCategoriesFaqs')->group(function(){
        Route::get('/','Configurations\LayoutiCategoriesFaqsController@All');
        Route::post('/arrange','Configurations\LayoutiCategoriesFaqsController@arrange');
        Route::post('/add','Configurations\LayoutiCategoriesFaqsController@add');
        Route::post('/update','Configurations\LayoutiCategoriesFaqsController@update');
        Route::post('/delete','Configurations\LayoutiCategoriesFaqsController@delete');

    });

    Route::prefix('deliverable')->group(function(){
        Route::get('/','Configurations\DeliverableController@All');
        Route::post('/add','Configurations\DeliverableController@Add');
        Route::post('/delete','Configurations\DeliverableController@Delete');

    });

    Route::prefix('layoutiCategoriesServices')->group(function(){
        Route::get('/','Configurations\LayoutiCategoriesServicesController@All');
        Route::post('/arrange','Configurations\LayoutiCategoriesServicesController@arrange');
        Route::post('/add','Configurations\LayoutiCategoriesServicesController@add');
        Route::post('/update','Configurations\LayoutiCategoriesServicesController@update');
        Route::post('/delete','Configurations\LayoutiCategoriesServicesController@delete');

    });

    Route::prefix('layoutiINeed')->group(function(){
        Route::get('/','Configurations\INeedController@All');
        Route::post('/arrange','Configurations\INeedController@arrange');
        Route::post('/add','Configurations\INeedController@add');
        Route::post('/update','Configurations\INeedController@update');
        Route::post('/delete','Configurations\INeedController@delete');

    });

    Route::prefix('layoutiBudget')->group(function(){
        Route::get('/','Configurations\BudgetController@All');
        Route::post('/arrange','Configurations\BudgetController@arrange');
        Route::post('/add','Configurations\BudgetController@add');
        Route::post('/update','Configurations\BudgetController@update');
        Route::post('/delete','Configurations\BudgetController@delete');

    });

    Route::prefix('admins')->name('admins.')->group(function(){
        Route::get('/','Configurations\AdminController@All')->name('index');
        Route::post('/add','Configurations\AdminController@Add');
        Route::post('/update','Configurations\AdminController@Update');
        Route::post('/delete','Configurations\AdminController@Delete');

    });

    Route::prefix('scopes')->name('scopes.')->group(function(){
        Route::get('/','Configurations\LayoutiScopeController@All')->name('index');
        Route::post('/add','Configurations\LayoutiScopeController@Add');
        Route::post('/update','Configurations\LayoutiScopeController@Update');
        Route::post('/delete','Configurations\LayoutiScopeController@Delete');
        Route::post('/deleteCard','Configurations\LayoutiScopeController@DeleteCard');

    });


});





Route::fallback('Auth\AuthController@NotFound');
