<?php

require_once('../controller/controller.php');

$controller=new Controller();

$akcija=isset($_GET['akcija'])?$_GET['akcija']:"";
$akcija2=isset($_POST['akcija'])?$_POST['akcija']:"";


switch($akcija){

case "prikazunosavozila":
$controller->prikazUnosaVozila();
break;

case "Unesite vozilo":
$controller->unosVozila();
break;




case "prikazunosavozaca":
$controller->prikazUnosaVozaca();
break;



case "Unesite vozaca":
$controller->unosVozaca();
break;


case "prikazsvihvozila":
$controller->prikazSvihVozila();
break;


case "prikazsvihvozaca":
$controller->prikazSvihVozaca();
break;


case "zaduzi":
$controller->zaduzi();
break;

case "Zaduzi":
$controller->zaduzenje();
break;


case "obrisivozilo":
$controller->obrisiVozilo();
break;



case "obrisivozaca":
$controller->obrisiVozaca();
break;



case "prikazizmenevozila":
$controller->prikazIzmeneVozila();
break;


case "Izmenite vozilo":
$controller->izmenaVozila();
break;

case "prikazizmenevozaca":
$controller->prikazIzmeneVozaca();
break;


 case "Izmenite vozaca":
 $controller->izmenaVozaca();
 break;

 case "logout":
 $controller->logout();
 break;



}

switch ($akcija2){

 case "Ulogujte se":
 $controller->login();
 break;


case "Registruj se":
$controller->registracija();
break;




}

?>


























