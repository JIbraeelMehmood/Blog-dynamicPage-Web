<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\GeneralController;
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

#Route::get('/', function () {
    //return view('Auth.login');
#});
Route::get('/',[GeneralController::class,'index'])->name('visiter');

Auth::routes();

Route::middleware(['auth'])->group(function(){
//BASIC
    Route::get('/post',[PostController::class,'index'])->name('postIndex');

//CRUD
    Route::get('/post/{id}', [PostController::class, 'show']);
    Route::post('/post',[PostController::class,'create'])->name('postCreate');
    Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('postEdit');
    Route::put('/post/edit/{id}',[PostController::class,'update'])->name('postUpdate');
    Route::get('/post/delete/{id}',[PostController::class,'destroy'])->name('postDelete');
    
//IMPORT-EXPORT

    Route::get('/new/category', 'ImportExportController@importExportView');
    Route::get('export', 'ImportExportController@export')->name('export');
    Route::post('import', 'ImportExportController@import')->name('import');

//MULTI-AUTH
    Route::get('/admin_dashboard', 'Dashboard\AdminController@index')->middleware('rolebase:admin')->name('admin_dashboard');
    Route::get('/user_dashboard','Dashboard\UserController@index')->middleware('rolebase:user')->name('user_dashboard');
//-----------------------------------------------------------------------------------------
    Route::get('/blogRequests', [AdminController::class, 'blogRequest'])->name('post.blogRequest');
    Route::delete('post/{id}', [AdminController::class, 'denyBlog'])->name('post.denyBlog');
    Route::get('post/delete/{id}', [AdminController::class, 'deletePermanently'])->name('deletePermanently');
    Route::get('post/restore/one/{id}', [AdminController::class, 'restore'])->name('post.restore');
    Route::get('post/restoreAll', [AdminController::class, 'restoreAll'])->name('post.restoreAll');
    Route::get('/user/list', [AdminController::class, 'userList'])->name('user.userList');
    Route::get('changeStatus', 'Dashboard\AdminController@changeStatus');
    /** CUSTOME Page ROUTES **/
        Route::group(['prefix' => 'admin'], function(){
        Route::get('/create-section', 'ajaxController@section')->name('section');
        Route::get('/dynamic-pages/list', 'ajaxController@dynamicpages')->name('dynamicpages');

        Route::post('/builtsection', 'ajaxController@builtsection')->name('builtsection');
        Route::get('/built-page', 'ajaxController@buildpage')->name('pagesection');

        Route::post('/new-page', 'ajaxController@builder')->name('pagebuilder');
        Route::get('page/section-delete/{id}', 'ajaxController@sectiondelete')->name('sectiondelete');

        Route::get('/{pagename}', 'ajaxController@pages')->name('pages');
        });
//-----------------------------------------------------------------------------------------
    Route::get('/user/addfriend{id}', [UserController::class, 'addFriend'])->name('addFriend');
    Route::get('/user/unfriend/{id}',[UserController::class, 'unFriend'])->name('unFriend');
    Route::get('/user/friends/',[UserController::class, 'friends'])->name('friends');
//=========================================================================================

//Extra 
    //Route::post('unfollow', 'UserController@unfollowUserRequest')->name('unfollow');
    //Route::get('user/{id}', 'UserController@user')->name('user.view');
    //Route::post('follow', 'UserController@follwUserRequest')->name('follow');
    //Route::get('/chats', 'ChatController@index');
    //Route::get('/messages', 'ChatController@fetchAllMessages');
    //Route::post('/messages', 'ChatController@sendMessage');
    //Route::get('/home',[DashboardController::class,'show'])->name('/home');
    //Route::get('/new/category',[CategoryController::class,'index'])->name('postIndex');
    //Route::get('/category/list',[PostController::class,'index'])->name('postIndex');
    //Route::get('/reviews',[PostController::class,'index'])->name('postIndex');

    });
    Route::get('/wrongRequest','Dashboard\AdminController@wrongRequest')->name('wrongRequest');
//GOOGLE
    Route::get('/google',[GoogleController::class,'redirecttoGoogle'])->name('google');
    Route::get('/google/callback',[GoogleController::class,'handleGooglecallback'])->name('googlecallback');

