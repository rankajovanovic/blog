<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\BadAgeMiddleware;
use App\Http\Controllers\TagsController;

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


// class QueryBuilder {
//   private $fields = [];
//   private $conditions = [];
//   private $order = null;

//   public function __construct() {}

//   public function where($condition) {
//     $this->conditions[] = $condition;
//     return $this;
//   }

//   public function orderBy($order) {
//     $this->order = $order;
//     return $this;
//   }


//   public function get() {
//     $sql ='select * from table where dslfhsljfklvzhfgdxkcj';
//     $dbConnection->execute($sql);
//     new Post($row)

//   }

// }

Route::get('/', [PostsController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'create'])->middleware('auth');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostsController::class, 'store'])->middleware('auth');

Route::get('/tags/create', [TagsController::class, 'create'])->middleware('auth');
Route::post('/tags', [TagsController::class, 'store'])->middleware('auth');

Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store')->middleware('auth', 'BadAge');


Route::get('/register', [AuthController::class, 'getRegistationForm'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/login', [AuthController::class, 'getLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/profile', function () {
    return auth()->user();
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');












//$  php artisan make:controller --model=Comment CommentsController 


