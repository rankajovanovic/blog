@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<h1>Posts</h1>
<ul>
  @foreach ($posts as $post)
    <li>
      <a href="{{route('posts.show', ['post' => $post->id])}}">
        {{$post->title}} ({{$post->comments->count()}}) --{{$post->author->name}}
      </a>
    </li>
  @endforeach
</ul>

{{$posts->links()}}
@endsection
