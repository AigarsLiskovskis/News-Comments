<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\User;
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

Route::get('/', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show']);

Route::get('article/create', [ArticleController::class, 'create'])->middleware('auth');
Route::post('articles/store', [ArticleController::class, 'store'])->middleware('auth');

Route::get('articles/edit/{article}', [ArticleController::class, 'edit'])->middleware('auth');
Route::patch('articles/update/{article}', [ArticleController::class, 'update'])->middleware('auth');

Route::delete('articles/delete/{article}', [ArticleController::class, 'delete'])->middleware('auth');

Route::post('articles/{article}/comments', [CommentController::class, 'store']);
Route::delete('articles/delete/{comment}', [CommentController::class, 'delete'])->middleware('auth');

Route::get('categories/{category:name}', [CategoryController::class, 'categorize']);

Route::get('writers/{writer:name}', function (User $writer) {
    return view('articles.index', [
        'articles' => $writer->articles
    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
