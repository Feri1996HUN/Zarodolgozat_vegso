<?php
require "db.php";

//  Változók
$tomb = null;
$kosarid = null;
$kosarme = 0;
$i = 0;


session_start();

if(isset($_SESSION["user"])){
  $belepve = true;
}
else{
  header("location: bejelentkezes.php");
}

if (isset($_POST["logout"])){
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
  header("location: index.php");
}

  // kapcsolódás az adatbázishoz
  $db = new Dbconnect();
  $db->Connection("webshop");

$kategoriak = $db->Kategoriak();
$kategoriavalaszt1 = $db->termekeksorok(1);
$kategoriavalaszt2 = $db->termekeksorok(2);
$kategoriavalaszt3 = $db->termekeksorok(3);

// Kosár feltöltése

foreach ($kategoriak as $key) {

  $kategoriavalaszt = $db->termekeksorok($key["ID_kategoria"]);
  foreach ($kategoriavalaszt as $key) {
    $azonositok = $key["ID_termek"];
  }

    if (isset($_POST["kosarba"])){
  
        foreach ($kategoriavalaszt as $key) {
          $azonositok = $key["ID_termek"];
          if (isset($_POST[$azonositok])) {
            $kosartartalom = array($azonositok, $_POST[$azonositok]);
            $iduser = $_SESSION["userid"];
            $idtermek = $kosartartalom[0];
            $mennyiseg = $kosartartalom[1];
            if ($mennyiseg > 0){
            $db->Rendelesfeltolt($iduser, $idtermek, $mennyiseg);
            }
            header("location: kosar.php");
          }
    }
}
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramis Webshop</title>
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
        <a><?php
            if($belepve){
                echo ('Üdv, '.$_SESSION["user"]);
            }
        ?></a>
      </li>
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
      <form action="" method="post">
      <button type="submit" class="btn btn-danger" name="logout">Kijelentkezés</button>
      </form>
      </li>
    </ul>
  </nav>
  
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
    <a class="btn btn-primary" data-toggle="collapse" href="#sorok" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-image: url('kepek/starohirdmeretezve.jpg'); width: 100%; height: 350px">
    <h1 class="cimszo" style="color: red;">Sörök</h1>
  </a>
    </div>
    <div class="col3">
    <a class="btn btn-primary" data-toggle="collapse" href="#minital" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-image: url('kepek/minosegi1teszt1.png'); width: 100%; height: 350px; ">
    <h1 class="cimszo" style="color: red;">Minőségi italok</h1>
    </a>
    </div>
    <div class="col3">
    <a class="btn btn-primary" data-toggle="collapse" href="#uditok" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-image: url('kepek/uditok1.jpg'); width: 100%; height: 350px; ">
    <h1 class="cimszo" style="color: red;">Üditők</h1>
    </a>
    </div>
  </div>
</div>
</div>
  
<!-- Sörök -->

<form action="" method="post">
<div class="collapse" id="sorok">
  <div class="card card-body">
  <div class="kontenerkategoriak">
    <h2 class="akcio">Sörök</h2>
  <div class="row">
    
    <?php
    if($kategoriavalaszt1){

        foreach ($kategoriavalaszt1 as $key) {
            print ("<div class='col4'><img src=".$key['Kep']."><h6>".$key['Nev']."</h6><p>".$key['Eladar']." Ft</p><input type='number' name=".$key['ID_termek']." id=".$key['ID_termek']." min='0' style='width: 100px;'><label>->Db</label></div>");
          }
    }
        ?>
  </div>
</div>  
</div>
</div>

<!-- Minőségi italok -->


<div class="collapse" id="minital">
  <div class="card card-body">
  <div class="kontenerkategoriak">
  <h2 class="akcio">Minőségi italok</h2>
  <div class="row">
  <?php
    if($kategoriavalaszt2){

        foreach ($kategoriavalaszt2 as $key) {
            print ("<div class='col4'><img src=".$key['Kep']."><h6>".$key['Nev']."</h6><p>".$key['Eladar']." Ft</p><input type='number' name=".$key['ID_termek']." id=".$key['ID_termek']." min='0' style='width: 100px;'><label>->Db</label></div>");
        }
    }
        ?>
    </div>
</div>  
</div>
</div>

<!-- Üditők -->


<div class="collapse" id="uditok">
  <div class="card card-body">
  <div class="kontenerkategoriak">
  <h2 class="akcio">Üditők</h2>
  <div class="row">
  <?php
    if($kategoriavalaszt3){

        foreach ($kategoriavalaszt3 as $key) {
          print ("<div class='col4'><img src=".$key['Kep']."><h6>".$key['Nev']."</h6><p>".$key['Eladar']." Ft</p><input type='number' name=".$key['ID_termek']." id=".$key['ID_termek']." min='0' style='width: 100px;'><label>->Db</label></div>");
        }
    }
        ?>
    </div>
  </div>
</div>  
</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-5">
    </div>
    <div class="col-sm-3">
    <button type='submit' class='btn btn-danger' id="kosargomb" name='kosarba' style="margin-bottom: 40px; padding: 15px">Kosár</button>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>
</form>


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