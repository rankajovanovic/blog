@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>{{$post->title}}</h1>
<p class="fs-5 text">{{$post->content}}</p>

  <!-- T A G S -->
@if($post->tags)
        <h5>Tags:</h5>
        @foreach($post->tags as $tag)
        <p> {{$tag->name}}</p>
        @endforeach
@endif

<!-- C O M M E N T S -->
<h3>Comments:</h3>
 @if(Session::has('message'))
        <div>
        {{session('message')}}
        </div>
@endif

        @foreach ($post->comments as $comment)
        <p class="border-top">{{$comment->content}}</p>
        @endforeach


<form method="POST" action="{{route('comments.store', ['post' => $post])}}">
@csrf
        <div class="mb-3">
        <label for="content" class="form-label">Write here:</label>
        <textarea class="form-control" id="content" rows="3" cols="5" name="content"></textarea>
        @include('partials.error-message', ['field' => 'content'])

        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" name="age" id="age">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
@endsection