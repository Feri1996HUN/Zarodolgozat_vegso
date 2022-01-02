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
    <title>Piramis főoldal</title>
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
    </ul>
  </nav>
  
</div>

<div class="row">
  <div class="col2">
      <h1>Nyíl utcai Piramis<br>italkereskedés</h1>
      <p>Debrecen városában a Nyíl utcában található italkereskedés nagy<br> választékkal és kedvező árakkal várja állandó és új vásárlóit!</p>
      <a href="kapcsolat.php" class="fedezdfel">&#8618; Tudj meg többet! &#8617;</a>
  </div>
  <div class="col2">
      <img src="kepek/boltkep.PNG">
    <!-- Boltról egy képet ide beszúrni nagy legyen  videó: https://youtu.be/yQimoqo0-7g?t=1066 -->
  </div>
</div>

<!-- Konténer vége -->
</div>
<!-- fejléc vége -->
</div>
    

<!-- Kategóriák -->
<div class="kategoriak">
  <div class="kontenerkategoriak">
  <div class="row">
    <div class="col3">
      <img src="kepek/starohirdmeretezve.jpg">
    </div>
    <div class="col3">
    <img src="kepek/borsodihirdmeretezve.jpg">
    </div>
    <div class="col3">
    <img src="kepek/cocahirdmeretezve.jpg">
    </div>
  </div>
</div>
</div>

<!-- Akciók -->

<div class="kontenerkategoriak">
  <h2 class="akcio">Akciók</h2>
  <div class="row">
    <div class="col4">
      <img src="kepek/dobkobmeretezve.jpg">
      <h4>Dob. Kőbányai Tálcára darabja</h4>
      <p>230 FT</p>
    </div>
    <div class="col4">
      <img src="kepek/uvegborsmretezve.jpg">
      <h4>Borsodi sör üveges 20 db-tól darabja csak</h4>
      <p>205 FT</p>
    </div>    <div class="col4">
      <img src="kepek/uvegsopmeretezve.jpg">
      <h4>Soproni sör üveges 20 db-tól darabja csak</h4>
      <p>200 FT</p>
    </div>    <div class="col4">
      <img src="kepek/jim1meretezve.jpg">
      <h4>Jim Beam 4L vásárlása esetén</h4>
      <p> 1000 Ft Akció</p>
    </div>
  </div>
</div>

<!-- Speciális akció -->

<div class="superakcio">
  <div class="kontenerkategoriak">
    <div class="row">
      <div class="col2">
        <img src="kepek/royalhirdmeretezve.jpg" class="akciokep">
      </div>
      <div class="col2">
        <h1>1500 FT KEDVEZMÉNY!</h1>
        <small>10 Liter bármilyen minőségi ital vásárlása esetén 1500 Ft kedvezmény jár a készlet erejéig</small>
        <a href="webshop.php" class="fedezdfel">&#8618; Vásárolj Most! &#8617;</a>
      </div>
    </div>
  </div>
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