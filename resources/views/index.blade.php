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
<!-- Navbar -->
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
        @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a style="font-weight: bold; color:black; text-transform: uppercase;"class="nav-link disabled">Dobrodosao {{auth()->user()->name}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/napravi">Napravi temu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Log out</a>
          </li>
        </ul>
        @else
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/registrate">Registruj se</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Uloguj se</a>
          </li>
        </ul>
        @endauth
      </div>
      <div class="d-flex align-items-center">
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
  </nav>

    <div class="container">
  @if ($errors->dada->any())
        @foreach ($errors->dada->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
      @endif
    </div>

  @foreach($teme as $t)
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{$t->naziv}}</h1>
      <?php
      $shortened = Str::limit($t->opis, 30);
      ?> 
      <p class="lead">{{$shortened}}</p>
      <a href="/tema/{{$t->id}}" target="_parent"><button class="button4">Komentarisi</button></a>
    </div>
  </div>
  @endforeach
</body>
</html>