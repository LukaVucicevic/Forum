<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style1.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <?php
  if($_SESSION["s"]!=1)
  {
    echo '<h3>NISTE ULOGOVANI!</h3>';
  }
  else
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "forum";
    $tema="";
    $imeTeme="";
    $i=0;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["imeTeme"])) 
      {
        echo '<script>alert("Morate uneti naziv teme!")</script>';
      }
      else
      {
        $imeTeme = $_POST["imeTeme"];
        $i++;
      }
      if (empty($_POST["tema"])) 
      {
        echo '<script>alert("Morate uneti temu!")</script>';
      }
      else
      {
        $tema=$_POST["tema"];
        $i++;
      }
    }
    if($i==2)
    {
      $korIme=$_SESSION["korIme"];
      $sql = "INSERT INTO tema (NazivTeme,OpisTeme,Korisnicko_ime) VALUES ('$imeTeme','$tema','$korIme')";
                  if(mysqli_query($conn, $sql)){} else{}
                  header("Location: index.php");
    }
    echo '<div class="container">
  <div class="row bootstrap snippets bootdeys">
      <div class="col-md-8 col-sm-12">
          <div class="comment-wrapper">
              <div class="panel panel-info">
                  <div class="panel-heading">
                      Unos teme
                  </div>
                  
                    <div class="panel-body">
                    <form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                        <input class="form-control"type="text" name="imeTeme" placeholder="Ime teme">
                        <textarea class="form-control" name="tema" placeholder="Napisi temu" rows="3"></textarea>
                        <br>
                        <button type="submit" class="btn btn-info pull-right">Post</button>
                        <div class="clearfix"></div>
                        <hr>
                        </form>
                    </div>
                  
              </div>
          </div>
  
      </div>
  </div>
  </div>';
  }
  
  ?>

</body>
</html>
