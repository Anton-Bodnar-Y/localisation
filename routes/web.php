<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
		    return view('welcome');
		})->name('welcome');




Route::get('{lang}', function ($lang) {
	    //return $lang;
	    App::setLocale($lang);
	    //return App::getLocale();
	    return back();
	    //return back()->withInput(App::setLocale($lang));
	})->name('lang');
	
	//App::setLocale('ru');
	
Route::group(['prefix' => App\Http\Middleware\languageMiddleware::getLocale()], function(){
	
	Route::group(['prefix'=>App::getLocale()], function(){
		
		Route::get('/link1', function () {
		    return trans('my-lang.my-str');
		    //return 'link1';
		})->name('link1');
		
		Route::get('/link2', function () {
			return trans('my-lang.my-str');
		    //return 'link2';
		})->name('link2');
		
		Route::get('/link3', function () {
			return trans('my-lang.my-str');
		    //return 'link3';
		})->name('link3');
		
	});
	
});
