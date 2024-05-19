@extends('layout')
@section('content')


  @if ($errors->any())
  <div class="alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
</div>
@endif

<form action="/article/{{$article->id}}" method="post">
    @METHOD('PUT')
  @csrf
<div class="mb-3 mt-2">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name='date' value="{{$article->date}}">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name='title' value="{{$article->title}}">
  </div>
  <div class="mb-3">
    <label for="shortDesc" class="form-label">Shortdesc</label>
    <input type="text" class="form-control" id="shortDesc" name='shortDesc' value="{{$article->shortDesc}}">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea name="text" id="text" cols="30" rows="10" class="form-control">{{$article->text}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection