<?php
require "db.php";

// üzenet változója meg tömb
$uzen = "";
$tomb = null;

// session törlése, ha valahol beragadt a session változó
if (isset($_SESSION["user"])){
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramis Kapcsolat</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<div class="row">
  <div class="col2">
      <h1>Kapcsolat:</h1>
      <h2>Piramis Italkereskedés Nonprofit Kft.</h2>
      <p>&#8658; Telefonszám: 11/123-456</p>
      <p>&#8658; E-mail: piramis@nemletezo.com</p>
      <p>&#8658; Cím: 4028 Debrecen Nyíl utca 118.</p>
      <p><img src="kepek/boltkep.PNG"></p>
  </div>
  <div class="col2">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.482601487894!2d21.63343151487606!3d47.538935300644276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47470dddd24d1f07%3A0xb10b546d3675aef1!2sDebrecen%2C%20Ny%C3%ADl%20u.%20118%2C%204028!5e0!3m2!1shu!2shu!4v1638369295787!5m2!1shu!2shu" width="100%" height="565px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>

<!-- Konténer vége -->
</div>
<!-- fejléc vége -->
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