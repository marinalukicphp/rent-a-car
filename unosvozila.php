<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <title>Unos vozila</title>
</head>

<body style=" background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(153, 153, 153));">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Rent a car</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a  class="nav-link" href="rute.php?akcija=prikazunosavozila">Unos vozila</a>    
    </li>
      <li class="nav-item">
         <a class="nav-link" href="rute.php?akcija=prikazunosavozaca">Unos vozaca</a>     
       </li>
       <li class="nav-item">
       <a class="nav-link" href="rute.php?akcija=zaduzi">Zaduzenje vozila</a>
       </li>


      <li class="nav-item">
      <a class="nav-link" href="rute.php?akcija=prikazsvihvozila">Prikaz vozila</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="rute.php?akcija=prikazsvihvozaca">Prikaz vozaca</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a href="rute.php?akcija=logout"  class="btn btn-outline-danger">Izlogujte se</a>
    </form>
  </div>
</nav>



<div class="container">

<a href="index.php" class="btn btn-warning">Nazad</a>


<h2>Unos vozila</h2>

<?php
require_once '../model/DAO.php';

$dao = new DAO();

$sviproizvodjaci=$dao->prikazSvihProizvodjaca();


$svekategorije=$dao->prikazSvihKategorija();

$errors=isset($errors)?$errors:array();

$msg=isset($msg)?$msg:"";

//echo "<h3 style='color:green;'>$msg</h3>";
if(!empty($msg)){
	echo " <span class='alert alert-danger' role='alert'>";
	echo $msg;
	echo "</span><br><br>";
	
}else{


if(empty($msg)){
 
echo "<span class='alert alert-success' role='alert'>";
echo $msg;
echo "</span><br><br>";
}

}


     session_start();

    if(isset($_SESSION['ulogovan'])){




?>

<form class="col-6" action="rute.php" method="get">
<label>Izaberite proizvodjaca</label><br>




<select name="proizvodjacivozila" class="form-control" >
<option value=""></option>
<?php
foreach ($sviproizvodjaci as $proizvodjac){
echo "<option value='$proizvodjac[imeproizvodjaca]'>$proizvodjac[imeproizvodjaca]</option>";

}

?>


<select>

<span style="color:red;"><?php if(array_key_exists('proizvodjac',$errors))echo $errors['proizvodjac'];?></span>

<br><br>
<input type="text" name="modelvozila" class="form-control" placeholder=" Unesite model vozila">
<span style="color:red;"><?php if(array_key_exists('model',$errors))echo $errors['model'];?></span>
<br><br>
<label>Izaberite kategoriju</label><br>

<select name="kategorijavozila" class="form-control">
<option value=""></option>
<?php
foreach ($svekategorije as $kat){
echo "<option value='$kat[kategorija]'>$kat[kategorija]</option>";

}
?>
<select>

<span style="color:red;"><?php if(array_key_exists('kategorija',$errors))echo $errors['kategorija'];?></span>

<br><br>
<input type="text" name="godistevozila" class="form-control" placeholder=" Unesite godiste vozila">
<span style="color:red;"><?php if(array_key_exists('godiste',$errors))echo $errors['godiste'];?></span>
<br><br>
<input type="text" name="cenavozila" class="form-control" placeholder=" Unesite cenu vozila">
<span style="color:red;"><?php if(array_key_exists('cena',$errors))echo $errors['cena'];?></span>
<br><br>
<input type="submit" name="akcija" class="btn btn-primary" value="Unesite vozilo">

</form>

<?php

}else{

header("Location:login.php");

}

?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>