<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/{id?}', function($id = null) {
    $name = '<p>Max Mustermann</p>';
    $age = 15;

    $people = [
        'Max Mustermann',
        'Peter',
        'Test'
    ];

    return view('test1', [
        'name' => $name,
        'age' => $age,
        'people' => $people,
        'id' => $id
    ]);
})->name('app.test');

Route::get('/home', function (){

    $posts = Post::all();

    foreach ($posts as $post) {
        echo $post->id;
    }

    dd($posts);

    return view('home');
})->name('app.home');

Route::prefix('/post')->name('post.')->group(function () {

    Route::get('/create', [PostController::class, 'create'])->name('create');

    Route::post('/store', [PostController::class, 'store'])->name('store');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/settings', [HomeController::class, 'settings'])->name('settings');

Route::get('/deleteAccount', [HomeController::class, 'deleteAccount'])->name('deleteAccount');
