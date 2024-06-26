@extends('layout')
@section('content')
<!--<div class="text-center ">-->
<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">{{$article->shortDesc}}</h6>
    <p class="card-text">{{$article->text}}</p>

    @can('create')
    <div class="d-flex">
        <a class="btn btn-secondary mr-2" href="/article/{{$article->id}}/edit" class="card-link">Edit article</a>
        <form action="/article/{{$article->id}}" method="post">
            @csrf
            @METHOD('DELETE')
            <button type="submit" class="btn btn-danger">Delete article</button>
        </form>
    </div>
    @endcan
  </div>
</div>

<div class="mt-5 text-center">
    <h3>Comments</h3>
</div>

@if (session('res'))
  <div class="alert-success">
    <p>The comment was successfully added and submitted for moderation!</p>
  </div>
@endif

@if ($errors->any())
  <div class="alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
</div>
@endif

<form action="/comment" method="post">
  @csrf
  <input type="hidden" name="article_id" value="{{$article->id}}">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name='title'>
  </div>
  
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea name="desc" id="text" cols="30" rows="3" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>

@foreach($comments as $comment)
<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">{{$comment->title}}</h5>
    <p class="card-text">{{$comment->desc}}</p>

    <div class="d-flex">
    @can('comment', $comment)
       <a class="btn btn-secondary mr-3" href="/comment/edit/{{$comment->id}}" class="card-link">Edit comment</a>
       <a class="btn btn-danger mr-3" href="/comment/delete/{{$comment->id}}" class="card-link">Delete comment</a>
    @endcan
    </div>

  </div>
</div>
@endforeach
<!--</div>--->

@endsection