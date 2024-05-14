<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
        
</head>
<body class="antialiased">

<header style="background-color: #ccc;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/main">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Article</a>
        </li>
        @can('create')
        <li class="nav-item">
          <a class="nav-link" href="/article/create">Create article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/comment/index">New comment</a>
        </li>
        @endcan
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Notify <span>{{auth()->user()->unreadNotifications()->count()}}</span>
          </a>
          <ul class="dropdown-menu">
            @foreach(auth()->user()->unreadNotifications as $notify)
            <li><a class="dropdown-item" href="{{route('article.show',['article'=>$notify->data['idArticle'], 'id_notify'=>$notify->id])}}">{{$notify->data['titleComment']}}</a></li>
            @endforeach
          </ul>
        </li>
        @endauth
      </ul>
      <div class="d-flex" role="search">
        @guest
        <a href="/signin" class="btn btn-outline-success mr-2">Sign in</a>
        <a href="/signup" class="btn btn-outline-success">Sign up</a>
        @endguest
        @auth
        <a href="/logout" class="btn btn-outline-success">Sign out</a>
        @endauth
</div>
    </div>
  </div>
</nav>
</header>
  <main>
    <div class="container">
      <div id="app">
        <App />
      </div>

    @yield('content')
    </div>
  </main>
</body>
</html>