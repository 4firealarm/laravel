<?php

use Illuminate\Support\Facades\Route;

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

Route::mixin(new \Laravel\Ui\AuthRouteMethods());
Route::auth(['verify' => true]);



Route::group(['namespace' => 'Web'], static function () {
    Route::get('/', 'HomeController@homepage')->name('homepage');
    Route::get('home', 'HomeController@index')->name('home.index');
    Route::get('deny', 'HomeController@deny')->name('home.deny');

    // 个人中心相关路由
    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

    // 用户话题相关路由
    Route::resource('topics', 'TopicsController', [
        'only' => ['index', 'create', 'store', 'update', 'edit', 'destroy'],
    ]);
    Route::post('upload', 'TopicsController@upload')->name('topics.upload');
    Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

    // 分类相关路由
    Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

    // 话题回复相关路由
    Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

    // 通知相关路由
    Route::resource('notifications', 'NotificationsController', ['only' => 'index']);
});

/*
Route::get('/', function () {
    $links = \App\Link::all();
	return view('welcome',['links' => $links]);
});


Route::get('/submit', function () {
    return view('submit');
})->middleware('verified');

*/

/*
use Illuminate\Http\Request;

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    $link = tap(new App\Link($data))->save();

    return redirect('/');
});


Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
 
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
*/

Auth::routes();

Route::get('/home', 'Web\HomeController@index')->name('home');

