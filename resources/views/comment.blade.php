<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Pocetna</title>
  <style>
    .button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button4:hover {background-color: #e7e7e7;}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
        </ul>

      </div>
      <div class="d-flex align-items-center">
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{$teme->naziv}}</h1>
      <p class="lead">{{$teme->opis}}</p>
    </div>
  </div>
  <div class="coment-bottom bg-white p-2 px-4">
    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
      <form action="{{ url('/tema/'.$teme->id.'/comment') }}" method="POST">
        @csrf
        <input type="text" name="comment" class="form-control mr-3" placeholder="Add comment">
        @error('comment')
        <p style="color:red;">{{$message}}</p> 
        @enderror
        <button class="btn btn-primary" type="submit">Comment</button>
      </form>
    </div>
    @foreach($komentari as $kom)
      <div class="commented-section mt-2">
        <div class="d-flex flex-row align-items-center commented-user">
          <h5 class="mr-2">{{$kom->ime}}</h5><span class="dot mb-1"></span></div>
            <div class="comment-text-sm"><span>{{$kom->opis}}</span></div>
        </div>
      @endforeach
</body>
</html>