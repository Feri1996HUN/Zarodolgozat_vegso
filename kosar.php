<?php
require "db.php";

session_start();

if(isset($_SESSION["user"])){
  $belepve = true;
  $uid = $_SESSION["userid"];
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

$maidatum = date("Y-m-d");
$osszar = 0;

$users = $db->selectUpload();
$rendelestomb = $db->rendelesek($uid, $maidatum);
$mairendelestomb = $db->MaiRendelesek($uid, $maidatum);

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosár tartalma</title>
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
    

<!-- Mai rendelések -->

<div class="kontenerkategoriak">
<h2 class="akcio">Mai rendelések: </h2>
</div>

<!-- Mai rendelések táblázat -->

<?php
        if (isset($mairendelestomb)){
          print("<table class='table table-striped table-dark'><thead><tr><th scope='col'>Sorszám</th><th scope='col'>Termék neve</th><th scope='col'>Mennyiség</th><th scope='col'>Összár</th><th scope='col'>Dátum</th></tr></thead><tbody>");
          $i = 1;
            foreach ($mairendelestomb as $key) {
                        print("<tr><th scope='row'>".$i."</th><td>".$key['Nev']."</td><td>".$key['Mennyiseg']." db</td><td>".$key['Eladar'] * $key['Mennyiseg']." Ft</td><td>".$key['datum']."</td></tr>");
                        $osszar += $key['Eladar'] * $key['Mennyiseg'];
                        $i++;
                    }
                print ("<tr><th colspan='5' style='text-align:center'>Összesen: ".$osszar." Ft</div></th></tr></tbody></table>");   
        }
        else {
          echo "<h2 class='akcio'>Mára még nem adott le rendelést!</h2>";
      }
        ?>

<!-- Korábbi rendelések -->

<div class="kontenerkategoriak">
<h2 class="akcio">Korábbi rendeléseim: </h2>
</div>

<!-- Korábbi rendelések táblázat-->

<?php
        if (isset($rendelestomb)){
          print("<table class='table table-hover'><thead><tr><th scope='col'>#</th><th scope='col'>Termék neve</th><th scope='col'>Mennyiség</th><th scope='col'>Összár</th><th scope='col'>Dátum</th></tr></thead><tbody>");
          $i = 1;
        foreach ($rendelestomb as $key) {
            print("<tr><th scope='row'>".$i."</th><td>".$key['Nev']."</td><td>".$key['Mennyiseg']." db</td><td>".$key['Eladar'] * $key['Mennyiseg']." Ft</td><td>".$key['datum']."</td></tr>");
            $i++;
        }
        print ("</tbody></table>");
        }
        else {
          echo "<h2 class='akcio'>Nincsen korábbi rendelése!</h2>";
      }
    
        ?>

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