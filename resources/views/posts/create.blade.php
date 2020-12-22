@extends('layouts.app')

@section('title', 'Create post')

@section('content')
<form method="POST" action="/posts" class="">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
    @include('partials.error-message', ['field' => 'title'])
  </div>

  <div class="mb-3">
    <label for="content" class="form-label">Write here:</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"></textarea>
    @include('partials.error-message', ['field' => 'content'])
  </div>

  @if($tags)
    <div class="mb-3">
      <select name="tag_id" id="tag_id">
      @foreach($tags as $tag)
          <option value="{{ $tag->id}}">{{$tag->name}}</option>
      @endforeach
    
    </select>
    </div>
  @endif

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1">
    <label class="form-check-label" for="is_published">Publish immediately</label>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
