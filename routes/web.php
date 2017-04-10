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
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::group(['before' => 'auth', 'prefix' => 'account'], function()
{
    Route::get('tenant', function ()    {
        $data = ['as'=>'tenant'];
        return view('tenant',$data);
    })->name('tenant');
    Route::get('extension', function ()    {
        $data = ['as'=>'extension'];
        return view('extension',$data);
    })->name('extension');
    Route::get('user', function ()    {
        $data = ['as'=>'user'];
        return view('user',$data);
    })->name('user');
    Route::get('permission', function ()    {
        $data = ['as'=>'permission'];
        return view('permission',$data);
    })->name('permission');
});

Route::group(['before' => 'auth', 'prefix' => 'config'], function()
{
    Route::get('blacklist', function ()    {
        $data = ['as'=>'blacklist'];
        return view('blacklist',$data);
    })->name('blacklist');
    Route::get('whitelist', function ()    {
        $data = ['as'=>'whitelist'];
        return view('whitelist',$data);
    })->name('whitelist');
    Route::get('welcoming', function ()    {
        $data = ['as'=>'welcoming'];
        return view('welcoming',$data);
    })->name('welcoming');
    Route::get('outside', function ()    {
        $data = ['as'=>'outside'];
        return view('outside',$data);
    })->name('outside');
    Route::get('schedhangup', function ()    {
        $data = ['as'=>'schedhangup'];
        return view('schedhangup',$data);
    })->name('schedhangup');
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
});

Route::group(['before' => 'auth', 'prefix' => 'stat'], function()
{
});

Route::group(['before' => 'auth', 'prefix' => 'monitor'], function()
{
});

Route::group(['before' => 'auth', 'prefix' => 'manage'], function()
{
});

Route::group(['before' => 'auth', 'prefix' => 'tool'], function()
{
});