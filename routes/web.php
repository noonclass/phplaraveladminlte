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
    return view('index');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('home', function () {
        return view('home');
    });
    Route::post('fileinput', 'FileinputController@index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'account'], function()
{
    // Tenant Web Routes
    Route::get( 'tenant',   ['as'=>'tenant','uses'=>'TenantController@index']);
    Route::post('tenant/c', 'TenantController@create');
    Route::post('tenant/r', 'TenantController@read');
    Route::post('tenant/u', 'TenantController@update');
    Route::post('tenant/d', 'TenantController@delete');
    Route::post('tenant/w', 'TenantController@wizard');
    
    // Extension Web Routes
    Route::get( 'extension',   ['as'=>'extension','uses'=>'ExtensionController@index']);
    Route::post('extension/c', 'ExtensionController@create');
    Route::post('extension/r', 'ExtensionController@read');
    Route::post('extension/u', 'ExtensionController@update');
    Route::post('extension/d', 'ExtensionController@delete');
    
    // User Web Routes
    Route::get( 'user',   ['as'=>'user','uses'=>'UserController@index']);
    Route::post('user/c', 'UserController@create');
    Route::post('user/r', 'UserController@read');
    Route::post('user/u', 'UserController@update');
    Route::post('user/d', 'UserController@delete');
    
    // Role Web Routes
    Route::get( 'role',   ['as'=>'role','uses'=>'RoleController@index']);
    Route::post('role/c', 'RoleController@create');
    Route::post('role/r', 'RoleController@read');
    Route::post('role/u', 'RoleController@update');
    Route::post('role/d', 'RoleController@delete');
    
    
    Route::get('permission', function ()    {
        $data = ['as'=>'permission'];
        return view('permission',$data);
    })->name('permission');
});

Route::group(['middleware' => 'auth', 'prefix' => 'config'], function()
{ 
     // Tenantmeta Web Routes
    Route::get( 'blacklist',   ['as'=>'blacklist','uses'=>'BlacklistController@index']);
    Route::post('blacklist/c', 'BlacklistController@create');
    Route::post('blacklist/r', 'BlacklistController@read');
    Route::post('blacklist/u', 'BlacklistController@update');
    Route::post('blacklist/d', 'BlacklistController@delete');
    Route::post('blacklist/ch', 'BlacklistController@change_select');
    
    
        // Tenantmeta Web Routes
    Route::get( 'whitelist',   ['as'=>'whitelist','uses'=>'WhitelistController@index']);
    Route::post('whitelist/c', 'WhitelistController@create');
    Route::post('whitelist/r', 'WhitelistController@read');
    Route::post('whitelist/u', 'WhitelistController@update');
    Route::post('whitelist/d', 'WhitelistController@delete');
    Route::post('whitelist/ch', 'WhitelistController@change_select');
    
  
    Route::get('welcoming', function ()    {
        $data = ['as'=>'welcoming'];
        return view('welcoming',$data);
    })->name('welcoming');
    
    // Outside Web Routes
    Route::get( 'outside',   ['as'=>'outside','uses'=>'OutsideController@index']);
    Route::post('outside/c', 'OutsideController@create');
    Route::post('outside/d', 'OutsideController@delete');
    Route::post('outside/s', 'OutsideController@read_extision'); 
    
    // Schedhangup Web Routes
    Route::get( 'schedhangup',   ['as'=>'schedhangup','uses'=>'SchedhangupController@index']);
    Route::post('schedhangup/r', 'SchedhangupController@read');
    Route::post('schedhangup/u', 'SchedhangupController@update');
  
    Route::get('transfer', function ()    {
        $data = ['as'=>'transfer'];
        return view('transfer',$data);
    })->name('transfer');
    Route::get('holdmusic', function ()    {
        $data = ['as'=>'holdmusic'];
        return view('holdmusic',$data);
    })->name('holdmusic');
    Route::get('2mobile', function ()    {
        $data = ['as'=>'2mobile'];
        return view('2mobile',$data);
    })->name('2mobile');
    Route::get('onedial', function ()    {
        $data = ['as'=>'onedial'];
        return view('onedial',$data);
    })->name('onedial');
    
     // Work_holiday Web Routes
    Route::get( 'work_holiday',   ['as'=>'work_holiday','uses'=>'WorkHolidayController@index']);
    Route::post('work_holiday/c', 'WorkHolidayController@create');
    Route::post('work_holiday/r', 'WorkHolidayController@read');
    Route::post('work_holiday/u', 'WorkHolidayController@update');
    Route::post('work_holiday/d', 'WorkHolidayController@delete');
    Route::post('work_holiday/ch', 'WorkHolidayController@change_select');
});

Route::group(['middleware' => 'auth', 'prefix' => 'stat'], function()
{
});

Route::group(['middleware' => 'auth', 'prefix' => 'monitor'], function()
{
});

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function()
{
});

Route::group(['middleware' => 'auth', 'prefix' => 'tool'], function()
{
});