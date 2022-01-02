<?php
require "db.php";

// üzenet változója meg tömb
$uzen = "";
$tomb = null;


// Ellenőzröm, hogy az oldal a login gombbal lett-e elküldve, és akkor dolgozom fel
if (isset($_POST["login"])){
    // Kimentem a küldött adatokat
    $user = $_POST["nev"];
    $pass = $_POST["pass"];

    // kapcsolódás az adatbázishoz
    $db = new Dbconnect();
    $db->Connection("webshop");

    // Ellenőrizzük, hogy az illető jogosult-e a kapcsolódásra
    if ($tomb = $db->Bejelentkezes($user, $pass)){
     // var_dump($tomb);
        session_start();
        $_SESSION["user"] = $user;
        $_SESSION["userid"] = $tomb[0]["ID_user"];
       
        header("location: webshop.php");
    }
    else {
        $db = null;
        $uzen = "Hibás bejelentkezési adatok!";
    }
}

?>






<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramis bejelentkezés</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
<!-- Fejléc -->
<div class="fejlec">

<!-- Konténer -->
<div class="kontenerfejlec">

<!-- Navbar -->
<div class="navbar">
  <div class="logo">
    <img src="kepek/pirlogo1.png" width="125px">
  </div>
  <nav>
    <ul>
      <li>
        <a href="index.php">Főoldal</a>
      </li>
      <li>
        <a href="kapcsolat.php">Kapcsolat</a>
      </li>
      <li>
        <a href="bejelentkezes.php">Bejelentkezés</a>
      </li>
      <li>
        <a href="regiszt.php">Regisztráció</a>
      </li>
      <li>
        <a href="webshop.php">Webshop</a>
      </li>
      <li>
        <a class="fa fa-shopping-cart" href="kosar.php"></a>
      </li>
      <li>
          <?php
            if(isset($_SESSION["user"])){
                echo ('<a href="index.php"></a>');
            }
        ?>
      </li>
    </ul>
  </nav>
  
</div>

<!-- Konténer vége -->
</div>
<!-- fejléc vége -->
</div>
    
<!-- Bejelentkezés -->

<div class="container-fluid text-center">
        <div class="jumbotron" style="margin: 50px">
        <h2>A webshop használatához be kell jelentkeznie vagy ha új felhasználó kérem regisztráljon.</h2>
            <h1>Bejelentkezés</h1>
        
        <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                <div class="form-group align-items-center text-center">
                <label for="nev">Név</label>
                <input type="text" class="form-control" name="nev" id="nev" placeholder="Név" required>
            </div>
            <div class="form-group align-items-center text-center">
                <label for="pwd">Jelszó</label>
                <input type="text" class="form-control" name="pass" id="pass" placeholder="Jelszó" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Bejelentkezés</button>
                </div>
                <div class="col-sm">
                </div>
                <div>
                <h3><?php echo $uzen ?><h3>
            </div>
            </div>
            </div>
            </div>
            
        </form>
    </div>




<!-- Lábléc -->

<div class="lablec">
  <div class="kontenerfejlec">
    <div class="row">
      <div class="lableccol1">
          <img src="kepek/pirlogo1.png">
      </div>
    </div>

  </div>
</div>

</body>
</html>