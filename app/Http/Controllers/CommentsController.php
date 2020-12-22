<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;
use App\Http\Middleware\BadAgeMiddleware;

class CommentsController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Post $post, CreateCommentRequest $request)
  {
    $data = $request->validated();
    $post->createComment($data['content']);

    session(['message' => 'Uspesno si sacuvao dati komentar']);
    info(session('message'));
    return redirect(route('posts.show', ['post'=>$post]))->with('message', 'Uspesno si sacuvao dati komentar');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function show(Comment $comment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function edit(Comment $comment)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Comment $comment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Comment $comment)
  {
    //
  }
}
