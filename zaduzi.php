<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
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
<br>
<div class="container">
<?php

require_once '../model/DAO.php';

$dao=new DAO();

$vozila=$dao->prikazSvihVozila();

$vozaci=$dao->prikazSvihVozaca();

$errors=isset($errors)?$errors:array();

$msg=isset($msg)?$msg:"";

//echo "<h1 style='color:green;'>$msg</h1>";


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
<a href="index.php" class="btn btn-warning">Nazad</a>


    <h1>Zaduzenje vozila</h1>




    <form class="col-6" action="rute.php" method="get">

   <p>Klijenti</p>
    
 <select name="klijent" class="form-control">
 <option value=""></option>
 <?php
 
 foreach($vozaci as $vo){

echo "<option value='$vo[idvozaca]'>$vo[ime] $vo[prezime]</option>";

 }


?>
 </select>
 <span style='color:red;'><?php if(array_key_exists('klijent',$errors))echo $errors['klijent'];?></span>
 <br><br>


 <p>Vozila</p>

 <select name="vozilo" class="form-control" >
 <option value=""></option>

<?php

 foreach($vozila as $v){

echo "<option value='$v[idvozila]'>$v[imeproizvodjaca] $v[model]</option>";


 }

?>




 </select>
 <span style='color:red;'><?php if(array_key_exists('vozilo',$errors))echo $errors['vozilo'];?></span>
 <br><br>

 <input type="submit" name="akcija" class="btn btn-primary" value="Zaduzi">


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






















































