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

<form action="/article" method="post">
  @csrf
<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name='date'>
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name='title'>
  </div>
  <div class="mb-3">
    <label for="shortDesc" class="form-label">Shortdesc</label>
    <input type="text" class="form-control" id="shortDesc" name='shortDesc'>
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection