<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::post('/visitor','HomeController@Visitor');
Route::get('/about','AboutController@index');
Route::get('/services','ServicesController@index');
Route::get('/things','ThingsController@index');
Route::get('/work','WorkController@index');
Route::post('/work/project','WorkController@find');
Route::get('/contact','ContactController@index');
Route::get('/budget','BudgetController@All');
Route::get('/iNeed','INeedController@All');
Route::post('/sayHello','SayHelloController@send');
Route::post('/hireUs','HireUsController@send');
Route::get('/blog','BlogController@index');
Route::get('/blog/category','BlogController@category');
Route::get('/blog/find','BlogController@find');
Route::get('/365Dsign','DaysDesignController@index');
Route::get('/365Dsign/staticProducts','DaysDesignController@staticProducts');
Route::get('/365Dsign/projects','DaysDesignController@projects')->name('frontend.projects');
Route::get('/365Dsign/projects/find','DaysDesignController@find');
Route::get('/365Dsign/links','DaysDesignController@links');
Route::get('/365Dsign/categories','DaysDesignController@categories');
Route::post('/365Dsign/likes','DaysDesignController@likes');
Route::post('/365Dsign/click','DaysDesignController@Click');
Route::post('/365Dsign/download','DaysDesignController@Download');
Route::get('/365Dsign/cv/','CvDesignHomeController@index');


Route::get('/learnUi','LearnUiController@index');
Route::get('/learnUi/getCountry','LearnUiController@getCountry');
Route::post('/learnUi/sendRegister','LearnUiController@send');

Route::get('/etoy/homePage','EToy\HomePageController@index');
Route::get('/etoy/aboutPage','EToy\AboutPageController@index');
Route::get('/etoy/contactUsPage','EToy\ContactUsPageController@index');
Route::get('/etoy/globalPage','EToy\GlobalPageController@index');
Route::get('/etoy/termsAndConditionsPage','EToy\TermsAndConditionsPageController@index');
Route::post('/etoy/contactUsPage','EToy\ContactUsPageController@send');

Route::get('/resources','ResourcesController@index');
Route::get('/resources/category','ResourcesController@category');
Route::post('/resources/click','ResourcesController@Click');
Route::post('/resources/download','ResourcesController@Download');
Route::post('/resources/like','ResourcesController@likes');
Route::post('/resources/requestResource','ResourcesController@requestResource');

Route::get('/avatars','AvatarController@Avatars')->name('avatar');
Route::get('/content','AvatarController@Content')->name('content');
Route::get('/uiGenerator','AvatarController@UIGenerator');
Route::get('/contentGenerator','AvatarController@ContentGenerator');



Route::fallback('HomeController@NotFound');
