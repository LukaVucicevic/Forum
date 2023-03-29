<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Document</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
      <?php
      if(isset($_SESSION["s"]))
      {
        echo '<a name="izlog" href="izlog.php" class="btn"><i class="fab fa-github"></i>Izloguj se</a>';
      }
      else 
      {
        echo '<a href="logovanje.php" class="btn"><i class="fab fa-github"></i> Prijavi se</a>
                <a href="registracija.php" class="btn"><i class="fab fa-github"></i> Registracija</a>';
      }
      ?>
      
      <a href="tema.php" class="btn"><i class="fab fa-github"></i>Kreiraj temu</a>
      
      
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$tema="";
$imeTeme="";
$i=0;
$j=0;
$id=0;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  $sql1 = "SELECT COUNT(id) as cnt FROM tema";
  $result = $conn->query($sql1);
  $row = $result->fetch_assoc();
  $id = $row['cnt'];
  for($i=1;$i<=$id;$i++)
  {
    $sql = "SELECT NazivTeme as nzv,OpisTeme as ops,Korisnicko_ime as ki FROM tema WHERE id='$i'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $imeTeme = $row["nzv"];
    $tema=$row["ops"];
    $korIme=$row["ki"];
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="media">
                              <div class="media-body">
                                <a href="#" class="anchor-username"><h4 class="media-heading">'. $row["ki"].'</h4></a> 
                              </div>
                            </div>
    <div class="container">
      <h1 class="display-4">'. $row["nzv"].'</h1>
      <p class="lead">'. $row["ops"].'</p>
      <a href="diskusija.php" class="btn"><i class="fab fa-github"></i>Napisi komentar</a>
    </div>
  </div>';
   
  }
?>

    
</body>
</html>