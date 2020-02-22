<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <title>Izmena vozaca</title>
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


    <h1>Izmena vozaca</h1>

    <?php

   $errors=isset($errors)?$errors:array();

   $msg=isset($msg)?$msg:"";
   
   //echo "<h2 style='color:green'>$msg</h2>";
  
if(!empty($msg)){
	echo " <span class='alert alert-danger' role='alert'>";
	echo $msg;
  echo "</span><br><br>";
}



   ?>


<form class="col-6" action="rute.php" method="get">


<?php



foreach($vozac as $v){



?>


 <input type="text" name="imevozaca" class="form-control" value ="<?php echo $v['ime'];?>"> 
<span style="color:red;"><?php if(array_key_exists('ime',$errors))echo $errors['ime'];?></span>
 <br><br>


 <input type="text" name="prezimevozaca" class="form-control" value="<?php  echo $v['prezime']; ?>" >
 <span style="color:red;"><?php if(array_key_exists('prezime',$errors))echo $errors['prezime'];?></span>
 <br><br>



 <input type="text" name="godistevozaca" class="form-control" value="<?php echo $v['godiste'];?>" >
 <span style="color:red;"><?php if(array_key_exists('godiste',$errors))echo $errors['godiste'];?></span>
 <br><br>

<?php } ?>
  
 <input type="hidden" name="idvozaca" value="<?php echo $v['idvozaca']; ?>" >



<input type="submit" name="akcija" class="btn btn-primary" value="Izmenite vozaca">



</form>
</div>
</body>
</html>










































