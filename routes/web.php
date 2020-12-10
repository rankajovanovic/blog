<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
   //  $posts = DB::table('posts')->where('is_published', 1)->get();
    $posts = Post::published()->orderBy('id', 'desc')->get();

    // return view('posts', [
    //     'posts' =>$posts;
    // )];
    return view('posts', compact('posts'));
});

Route::get( '/posts/ {post}' , function(Post $post) {

    //get( '/posts/{id}' , function($id)
    //$post = Post::findOrFail($id); //radi samo za id
    return view('post', compact('post'));
})->name('posts.single');
