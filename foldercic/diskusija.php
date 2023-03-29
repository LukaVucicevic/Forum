<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Document</title>
</head>
<body>
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
    if ($conn->connect_error) 
    {
      die("Connection failed: " . $conn->connect_error);
    }
      $sql = "SELECT COUNT(id) as cnt FROM tema";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $id = $row['cnt'];
      for($i=1;$i<=$id;$i++)
      {
        
        $sql = "SELECT NazivTeme as nzv,OpisTeme as ops,Korisnicko_ime as ki,id as id FROM tema WHERE id='$i'";
        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $imeTeme = $row["nzv"];
        $tema=$row["ops"];
        $korIme=$row["ki"];
        $idZaUnos=$row["id"];
        $sql1 = "SELECT Ime as ime,Prezime as prez FROM Korisnik WHERE mejl='$korIme'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $imeKreatora=$row["ime"];
       /* echo '<div class="container">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-body">
                   <section class="post-heading">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="media">
                                  <div class="media-left">
                                    <a href="#">
                                      <img class="media-object photo-profile" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <a href="#" class="anchor-username"><h4 class="media-heading">'.$row1["ime"].'  '.$row1["prez"].'</h4></a> 
                                    <a href="#" class="anchor-time">51 mins</a>
                                  </div>
                                </div>
                            </div>
                        </div>             
                   </section>
                   <section class="post-body">
                       <h4>'.$row["nzv"].'</h4>
                   </section>
                   <section class="post-body">
                       <p>'.$row["ops"].'</p>
                   </section>
                   <section class="post-footer">
                       <hr>
                       <div class="post-footer-comment-wrapper">
                           <div class="comment-form">
                               
                           </div>
                           <div class="comment">
                                <div class="media">
                                  <div class="media-left">
                                    <a href="#">
                                      <img class="media-object photo-profile" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="32" height="32" alt="...">
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <input type="text"></input>
                                  </div>
                                </div>
                           </div>
                       </div>
                   </section>
                </div>
            </div>   
        </div>
    </div>';*/
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="media">
    <div class="media">
    <div class="media-left">
      <a href="#">
        <img class="media-object photo-profile" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
      </a>
    </div>
    <div class="media-body">
      <a href="#" class="anchor-username"><h4 class="media-heading">'.$row1["ime"].'  '.$row1["prez"].'</h4></a> 

    </div>
  </div>
                            </div>
    <div class="container">
      <h1 class="display-4">'. $row["nzv"].'</h1>
      <p class="lead">'. $row["ops"].'</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input name="kom" type="text"></input>
      <a href="" class="btn"><i class="fab fa-github"></i>Napisi komentar</a>
      </form>
    </div>
  </div>';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $kom = $_POST["kom"];
        }
        $sql2 = "INSERT INTO komentari (id_tema,ime_kreatora,opis) VALUES ('$idZaUnos','$imeKreatora','$kom')";

    ?>

</body>
</html>