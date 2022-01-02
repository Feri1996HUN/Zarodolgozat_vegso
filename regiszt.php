<?php
require "db.php";

// üzenet változója meg tömb
$uzen = "";
$tomb = null;

// session törlése, ha valahol beragadt a session változó
if (isset($_SESSION["user"])){
    session_destroy();
}

// Ellenőrzöm, hogy az odlal a regisztrációs gombbal lett-e elküldve
if (isset($_POST["regisztraciogomb"])){
  // Kimentem a küldött adatokat
  $user = $_POST["nev"];
  $pwd = $_POST["pwd"];
  $iranyitoszam = $_POST["irszam"];
  $utca = $_POST["utca"];
  $hazszam = $_POST["hazszam"];
  $emelet = $_POST["emelet"];
  $ajto = $_POST["ajto"];
  $email = $_POST["email"];
  $telefon = $_POST["tel"];

  // kapcsolódás az adatbázishoz
  $db = new Dbconnect();
  $db->Connection("webshop");

  // Ellenőrizzük, hogy már létező adatokat visz fel vagy nem
  if ($db->RegisztracioCheck($reguser)){
      $db = null;
      $uzen = "Már regisztráltak ilyen adatokkal!";
  }
  else {
      $db->regisztracio($user, $pwd, $iranyitoszam, $utca, $hazszam, $emelet, $ajto, $email, $telefon);
      $uzen = "Sikeres regisztráció!";
      header("location: bejelentkezes.php");
  }
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramis regisztráció</title>
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
    </ul>
  </nav>
  
</div>

<!-- Konténer vége -->
</div>
<!-- fejléc vége -->
</div>
    
<!-- Regisztráció -->

<div class="container-fluid text-center">
        <div class="jumbotron" style="margin: 50px">
            <h1>Regisztráció</h1>
        
        <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nev" id="nev" placeholder="Név" style="width: 30%" required>
                </div>
                <div class="col-sm">
                    Debrecen
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" name="irszam" id="irszam" placeholder="Irányítószám" style="width: 65%" required>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                    <input type="text" class="form-control" name="pwd" id="pwd" placeholder="Jelszó" style="width: 35.5%" required>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="utca" id="utca" placeholder="Utca" style="width: 100%" required>
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" name="hazszam" id="hazszam" placeholder="Hsz" style="width: 100%" required>
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" name="emelet" id="emelet" placeholder="Em">
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" name="ajto" id="ajto" placeholder="Ajtó">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="Telefon" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="regisztraciogomb" style="margin: 50px">Regisztráció</button>
            </div>
            <div>
                <h3><?php echo $uzen ?><h3>
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