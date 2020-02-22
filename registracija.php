<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registracija </title>
</head>
<body>
    <h1>Registracija</h1>

<?php
    $msg=isset($msg)?$msg:"";
    echo $msg;

    $errors=isset($errors)?$errors:array();
    ?>
 <form action="rute.php" method="post">

 <input type="text" name="ime" placeholder="Unesite ime">
 <span style="color:red;"><?php if(array_key_exists('ime',$errors))echo $errors['ime'];?></span>
 <br><br>

 <input type="text" name="prezime" placeholder="Unesite prezime">
 <span style="color:red;"><?php if(array_key_exists('prezime',$errors))echo $errors['prezime'];?></span>
 <br><br>

 
 <input type="text" name="email" placeholder="Unesite email">
 <span style="color:red;"><?php if(array_key_exists('email',$errors))echo $errors['email'];?></span>
 <br><br>

 <input type="date" name="datum" value="datum">
 <span style="color:red;"><?php if(array_key_exists('datum',$errors))echo $errors['datum'];?></span>
 <br><br>

 <input type="text" name="username" placeholder="Unesite username">
 <span style="color:red;"><?php if(array_key_exists('username',$errors))echo $errors['username'];?></span>
 <br><br>

 <input type="password" name="password" placeholder="Unesite password">
 <span style="color:red;"><?php if(array_key_exists('password',$errors))echo $errors['password'];?></span>
<br><br>


<input type="submit" name="akcija" value="Registruj se">



</form>
</body>
</html>





























