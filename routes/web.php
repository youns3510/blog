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
Route::post('/subscribe','SubscribeController@subscribe')->name('subscribe');

Route::get('/','FrontEndController@index');
Route::get('/post/{slug}','FrontEndController@singlePost')->name('post.single');
Route::get('/category/{id}','FrontEndController@category')->name('category.single');
Route::get('/tag/{id}','FrontEndController@tag')->name('tag.single');

Route::get('/results',function(){
    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();
    return view('pages.search')
    ->with('posts',$posts)
    ->with('query',request('query'))
    ->with('setting',\App\Setting::first())//for footer
    ->with('categories',\App\Category::take(5)->get()) //for header
    ->with('tags',\App\Tag::all());//for sidebar
    
});

Auth::routes(['register'=>false]);
// Route::get('/test',function(){
//     $user=App\User::find(1);
//     return  $user->profile->avatar;
// });
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // ==============Setting==============
    Route::get('setting/edit','SettingController@edit')->name('setting.edit');
    Route::put('setting/update','SettingController@update')->name('setting.update');
    // ==========profile=====================
    Route::get('profile/edit','ProfileController@edit')->name('profile.edit');
    Route::post('profile/update','ProfileController@update')->name('profile.update');
    // ===================User=================
    Route::resource('user', 'UserController');
    Route::get('/user/permission/{user}','UserController@permission')->name('permission');
    Route::get('/user/{user}', 'UserController@destroy')->name('user.delete');
    Route::get('/U_trashed', 'UserController@trash')->name('user.trash');
    Route::get('/user/restore/{id}', 'UserController@user_restore')->name('user.restore');
    Route::get('/user/hdelete/{id}', 'UserController@hdelete')->name('user.hdelete');
    

// =================Post================================

    Route::resource('post', 'PostController');
    Route::get('/post/show/{post}', 'PostController@show')->name('post.show');
    Route::get('/post/{post}', 'PostController@destroy')->name('post.delete');
    Route::get('/P_trashed', 'PostController@trash')->name('post.trash');
    Route::get('/post/restore/{id}', 'PostController@post_restore')->name('post.restore');
    Route::get('/post/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
// =================Category================================
    Route::resource('category', 'CategoryController');
    Route::get('category/{category}', 'CategoryController@destroy')->name('category.delete');
    Route::get('/Cat_trashed', 'CategoryController@trash')->name('category.trash');
    Route::get('/category/restore/{id}', 'CategoryController@cat_restore')->name('category.restore');
    Route::get('/category/hdelete/{id}', 'CategoryController@hdelete')->name('category.hdelete');
// =================Tag================================

    Route::resource('tag', 'TagController');
    Route::get('tag/{tag}', 'TagController@destroy')->name('tag.delete');
    Route::get('/tag_trashed', 'TagController@trash')->name('tag.trash');
    Route::get('/tag/restore/{id}', 'TagController@cat_restore')->name('tag.restore');
    Route::get('/tag/hdelete/{id}', 'TagController@hdelete')->name('tag.hdelete');
    
});

