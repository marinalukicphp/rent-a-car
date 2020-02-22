<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <title>Izmena vozila</title>
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
         <a class="nav-link" href="#">Unos vozaca</a>     
       </li>
       <li class="nav-item">
       <a class="nav-link" href="rute.php?akcija=zaduzenje">Zaduzenje vozila</a>
       </li>


      <li class="nav-item">
      <a class="nav-link" href="rute.php?akcija=prikazvozila">Prikaz vozila</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="rute.php?akcija=prikaz_vozaca">Prikaz vozaca</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a href="rute.php?akcija=logout"  class="btn btn-outline-danger">Izlogujte se</a>
    </form>
  </div>
</nav>




<div class="container">

<h2>Izmena vozila</h2>

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
	
}





?>
<form class="col-6" action="rute.php" method="get">

<label>Izaberite proizvodjaca</label><br>

<?php

foreach($vozilo as $v){

?>

<select name="proizvodjacivozila" class="form-control"  >
<option value=""></option>
<?php

foreach ($sviproizvodjaci as $proizvodjac){
    ?>

<option value="<?php echo $proizvodjac['imeproizvodjaca'];?>"

<?php if($proizvodjac['imeproizvodjaca']==$v['imeproizvodjaca']) echo "selected";?>>

<?php echo $proizvodjac['imeproizvodjaca'];?></option>;

<?php
}
?>


</select>

<span style="color:red;"><?php if(array_key_exists('proizvodjac',$errors))echo $errors['proizvodjac'];?></span>

<br><br>
<input type="text" name="modelvozila" class="form-control" value="<?php echo $v['model'];?>">
<span style="color:red;"><?php if(array_key_exists('model',$errors))echo $errors['model'];?></span>
<br><br>
<label>Izaberite kategoriju</label><br>

<select name="kategorijavozila" class="form-control"  >
<option value=""></option>
<?php
foreach ($svekategorije as $kat){

    ?>
<option value="<?php echo $kat['kategorija'];?>"

<?php if($kat['kategorija']==$v['kategorija']) echo "selected";?>>

<?php echo $kat['kategorija'];?></option>;

<?php
}
?>
</select>

<span style="color:red;"><?php if(array_key_exists('kategorija',$errors))echo $errors['kategorija'];?></span>

<br><br>
<input type="text" name="godistevozila" class="form-control" value="<?php echo $v['godiste'];?>">
<span style="color:red;"><?php if(array_key_exists('godiste',$errors))echo $errors['godiste'];?></span>
<br><br>
<input type="text" name="cenavozila" class="form-control" value="<?php echo $v['cena'];?>">
<span style="color:red;"><?php if(array_key_exists('cena',$errors))echo $errors['cena'];?></span>
<br><br>

<?php } ?>

<input type="hidden" name="idvozila" value="<?php echo $v['idvozila'];?>">

<input type="submit" name="akcija" class="btn btn-primary" value="Izmenite vozilo">

</form>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>




























