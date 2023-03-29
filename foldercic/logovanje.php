<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Document</title>
</head>
<body>
<?php
  $ime = $jmbg1 = "";
  $imeErr = $jmbgErr = "";
  $i=0;
  $j=0;
  $s=0;
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "forum";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
    /*if(isset($_POST["submit"]))
    {
        $ime = $_POST["ime"];
        $jmbg = $_POST["jmbg"];
    }*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["korIme"])) 
        {
            echo '<script>alert("Korisnicko ime je obavezno!")</script>';
        } 
        else 
        {
            $korIme = $_POST["korIme"];
            if (!filter_var($korIme, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Neispravno korisnicko ime!")</script>';
            }
            else 
            {
                $i++;
            }
        }
        if (empty($_POST["lozinka"])) 
        {
          echo '<script>alert("Lozinka je obavezna!")</script>';
        }
        else
        {
            $lozinka=$_POST["lozinka"];
            $i++;
        }
    }
    /*function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }*/
        if($i==2)
        {
            $select = mysqli_query($conn, "SELECT Mejl FROM Korisnik WHERE Mejl = '".$_POST['korIme']."'") or exit(mysqli_error($conn));
            $select1=mysqli_query($conn, "SELECT Lozinka FROM Korisnik WHERE Lozinka = '".$_POST['lozinka']."' AND Mejl = '".$_POST['korIme']."' ") or exit(mysqli_error($conn));
            if(!((mysqli_num_rows($select))&&(mysqli_num_rows($select1))))
            {
                echo '<script>alert("Mejl ili sifra se ne podudaraju!")</script>';
            }
            else
            {
                /*$sql = "INSERT INTO Korisnik (Mejl,Lozinka) VALUES ('$korIme','$lozinka')";
                if(mysqli_query($conn, $sql)){} else{}*/
                $_SESSION["korIme"]=$korIme;
                $s=1;
                $_SESSION["s"]=$s;
                header("Location: index.php");
                exit();
            }
        }
  ?>
<div class="wrapper">
  <div id="formContent">

    <div>
      <img src="https://us.123rf.com/450wm/nabiev7art/nabiev7art2104/nabiev7art210400090/168216740-blue-flat-checkmark-icon-vector-badge-of-ok-warranty-approved-accept-checked-and-quality-.jpg?ver=6" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" name="korIme" placeholder="Korisnicko ime">
      <input type="password" name="lozinka"  placeholder="Lozinka">
      <input type="submit" value="Uloguj se">
</form>
  </div>
</div>
</body>
</html>
