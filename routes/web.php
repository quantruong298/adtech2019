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
use App\Enums\Roles;
use App\Models\User;


Route::get('/test', function () {
    $getListUser = User::all();
    return view('Component.Admin.user', compact('getListUser'));
})->middleware('auth');

Route::get('/', function () {
    return redirect('home');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Admin
/*Route::resource('users', 'UserController')->middleware('auth','role:admin');*/
Route::get('admin/', function () {
    return redirect('admin/users');
});

Route::middleware(['auth','role:'.Roles::ADMIN])->prefix('admin')->group(function () {
    Route::resource('users', 'UserController',['as'=>'admin' ]);
});
Route::get('publisher/', function () {
    return redirect('publisher/social_accounts');
});
Route::middleware(['auth','role:'.Roles::PUBLISHER])->prefix('publisher')->group(function () {
    Route::resource('social_accounts', 'SocialAccountController',['as'=>'publisher' ]);
});
//
//Route::get('/test', function () {
//    $getListUser = \App\Models\User::all();
//    return view('Component.Admin.user', compact('getListUser'));
//})->middleware('auth');



/*Route::middleware(['auth','role:'.Roles::MP])->prefix('mp')->group(function () {
    Route::resource('Plan', 'PlanController',['as'=>'mp' ]);
});*/
/*Route::get('/mp/plans', function () {
    return App::call('\App\Http\Controllers\MP\PlanController@index');
})->middleware('auth', 'role:'.Roles::MP);*/


Route::get('/ads', function () {
    return 'Welcome media planning';
})->middleware('auth', 'role:'.Roles::ADVERTISEMENT);

Route::get('/dmp', function () {
    return 'Welcome media planning';
})->middleware('auth', 'role:'.Roles::DMP);

Route::get('/user', function () {
    return 'Welcome User';
})->middleware('auth', 'role:'.Roles::USER);



Route::get('/Advertiser', function () {
    return 'Welcome Advertiser';
})->middleware('auth', 'role:Advertiser');

Route::middleware(['auth','role:'.\App\Enums\Roles::SSP])->prefix('ssp')
    ->group(function () {
        Route::get('/','SspController@index')->name('SSP');
        Route::post('/add','SspController@store')->name('SSP/ADD');
});
//Route::get('/ssp','SspController@index')->name('SSP');
//Route::post('/ssp/add','SspController@store')->name('SSP/ADD');

Route::get('/dsp', function () {
    return 'Welcome DSP';
})->middleware('auth', 'role:'.Roles::DSP);

Route::get('/mp','MP\GeneralController@index')->middleware('auth', 'role:'.Roles::MP);
Route::get('/mp/c/{id}','MP\GeneralController@getAdGroupsByCampaignId')->middleware('auth', 'role:'.Roles::MP);
Route::get('/mp/a/{id}','MP\GeneralController@getAdsByAdGroupId')->middleware('auth', 'role:'.Roles::MP);
Route::resource('mp/campaigns', 'MP\CampaignController')->except(['destroy']);
Route::resource('mp/adgroups', 'MP\AdGroupController')->except(['destroy']);
Route::resource('mp/ads', 'MP\AdController')->except(['destroy']);
Route::get('mp/ads/ag/{id}', 'MP\AdController@getAdGroup');
Route::resource('mp/plans', 'MP\PlanController');
Route::get('mp/plans/camp/{id}', 'MP\PlanController@getCampaign');

Route::get('/mp/ads/detail/{id}','MP\AdController@detail')->name('ads.detail');
