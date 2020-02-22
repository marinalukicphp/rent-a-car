
<?php

require_once '../model/DAO.php';

class Controller{

public function prikazUnosaVozila(){

    include 'unosvozila.php';
}


public function unosVozila(){


   
$proizvodjac=isset($_GET['proizvodjacivozila'])?$_GET['proizvodjacivozila']:"";
   $model=isset($_GET['modelvozila'])?$_GET['modelvozila']:"";
   $kategorija=isset($_GET['kategorijavozila'])?$_GET['kategorijavozila']:"";
   $godiste=isset($_GET['godistevozila'])?$_GET['godistevozila']:"";
   $cena=isset($_GET['cenavozila'])?$_GET['cenavozila']:"";

  $errors=array();

  if(empty($proizvodjac)){
      $errors['proizvodjac']="Morate izabrati proizvodjaca vozila";
  }

  if(empty($model)){
    $errors['model']="Morate uneti model vozila";
 }

 if(empty($kategorija)){
    $errors['kategorija']="Morate izabrati kategoriju kojoj vozilo pripada";
}
if(empty($godiste)){
    $errors['godiste']="Morate uneti godiste auta";
}else{
  
if(is_numeric($godiste)){

if($godiste<1950 || $godiste >2019){

$errors['godiste']="Godiste mora biti izmedju 1950 i 2019";



}

}else{

$errors['godiste']="Godiste mora biti numericka vrednost";

}

}

if(empty($cena)){
    $errors['cena']="Morate uneti cenu vozila";
}else{


}

if(count($errors)==0){

$dao=new DAO();

$dao->unosVozila($proizvodjac,$model,$kategorija,$godiste,$cena);

$msg="Uspesan unos";

include 'unosvozila.php';

}else{

$msg="Molimo Vas popunite sva polja korektno.";
include 'unosvozila.php';
}

}

public function prikazUnosaVozaca(){

include 'unosvozaca.php';


}

public function unosVozaca(){

$ime=isset($_GET['imevozaca'])?$_GET['imevozaca']:"";
$prezime=isset($_GET['prezimevozaca'])?$_GET['prezimevozaca']:"";
$godiste=isset($_GET['godistevozaca'])?$_GET['godistevozaca']:"";

$errors=array();

if(empty($ime)){

$errors['ime']="Morate uneti ime vozaca";

}

if(empty($prezime)){

$errors['prezime']="Morate uneti prezime vozaca";

}

if(empty($godiste)){

$errors['godiste']="Morate uneti godiste vozaca";


}


if(count($errors)==0){

$dao=new DAO();  

$dao->unosVozaca($ime,$prezime,$godiste);

$msg="Uspesan unos";

include 'unosvozaca.php';


}else{

$msg="Morate popuniti sva polja korektno";

include 'unosvozaca.php';



}

}

public function prikazSvihVozila(){


include 'prikazvozila.php';


}



public function prikazSvihVozaca(){


    include 'prikazvozaca.php';
    
    
    }
    


 public function zaduzi(){

 include 'zaduzi.php';


 }


 public function zaduzenje(){

 $klijent=isset($_GET['klijent'])?$_GET['klijent']:"";
 $vozilo=isset($_GET['vozilo'])?$_GET['vozilo']:"";

 $errors=array();

 if(empty($klijent)){

 $errors['klijent']="Morate uneti klijenta";

 }

 if(empty($vozilo)){

    $errors['vozilo']="Morate uneti vozilo";
   
    }

 if(count($errors)==0){

 $dao=new DAO();

 $dao->zaduzenje($klijent,$vozilo);

 $msg="Uspesan unos";

 include 'zaduzi.php';

 }else{

 $msg="Morate popuniti sva polja korektno";

 include 'zaduzi.php';


 }


 }

 public function obrisiVozilo(){

 $idvozila=isset($_GET['idvoz'])?$_GET['idvoz']:"";

 if(!empty($idvozila)){

 $dao=new DAO();

 $obrisivozilo=$dao->obrisiVozilo($idvozila);

 $prikazvozila=$dao->prikazSvihVozila();

 $msg="Vozilo obrisano";

 include 'prikazvozila.php';


 }else{



 }


 }






 public function obrisiVozaca(){

    $idvozaca=isset($_GET['idvoz'])?$_GET['idvoz']:"";
   
    if(!empty($idvozaca)){
   
    $dao=new DAO();
   
    $obrisivozaca=$dao->obrisiVozaca($idvozaca);
   
    $prikazvozaca=$dao->prikazSvihVozaca();
   
    $msg="Vozac obrisan";
   
    include 'prikazvozaca.php';
   
   
    }else{
   
   
   
    }
   
   
    }


 public function prikazIzmeneVozila(){

 $idvozila=isset($_GET['idvozila'])?$_GET['idvozila']:"";

 if(!empty($idvozila)){

 $dao=new DAO();

 $vozilo=$dao->prikazVozilaPoIdu($idvozila);

 include 'izmenavozila.php';




 }else{




 }


}

 public function izmenaVozila(){



    $proizvodjac=isset($_GET['proizvodjacivozila'])?$_GET['proizvodjacivozila']:"";
    $model=isset($_GET['modelvozila'])?$_GET['modelvozila']:"";
    $kategorija=isset($_GET['kategorijavozila'])?$_GET['kategorijavozila']:"";
    $godiste=isset($_GET['godistevozila'])?$_GET['godistevozila']:"";
    $cena=isset($_GET['cenavozila'])?$_GET['cenavozila']:"";
    $idvozila=isset($_GET['idvozila'])?$_GET['idvozila']:"";
 
   $errors=array();
 
   if(empty($proizvodjac)){
       $errors['proizvodjac']="Morate izabrati proizvodjaca vozila";
   }
 
   if(empty($model)){
     $errors['model']="Morate uneti model vozila";
  }
 
  if(empty($kategorija)){
     $errors['kategorija']="Morate izabrati kategoriju kojoj vozilo pripada";
 }
 if(empty($godiste)){
     $errors['godiste']="Morate uneti godiste auta";
 }
 
 
 
 if(empty($cena)){
     $errors['cena']="Morate uneti cenu vozila";
 }
 
 if(count($errors)==0){
 
 $dao=new DAO();
 
 $dao->izmenaVozila($proizvodjac,$model,$kategorija,$godiste,$cena,$idvozila);

 $vozilo=$dao->prikazVozilaPoIdu($idvozila);

 $msg="Uspesna izmena";
 
 include 'izmenavozila.php';
 
 }else{
 
 
 
 }

 }
 
 public function prikazIzmeneVozaca(){

 $idvozaca=isset($_GET['idvozaca'])?$_GET['idvozaca']:"";

 if(!empty($idvozaca)){

 $dao=new DAO();

 $vozac=$dao->prikazVozacaPoIdu($idvozaca);

 include 'izmenavozaca.php';
 

 }else{


    
 }

 }

 public function izmenaVozaca(){

    $ime=isset($_GET['imevozaca'])?$_GET['imevozaca']:"";
    $prezime=isset($_GET['prezimevozaca'])?$_GET['prezimevozaca']:"";
    $godiste=isset($_GET['godistevozaca'])?$_GET['godistevozaca']:"";
    $idvozaca=isset($_GET['idvozaca'])?$_GET['idvozaca']:"";
  
    $errors=array();
    
    if(empty($ime)){
    
    $errors['ime']="Morate uneti ime vozaca";
    
    }
    
    if(empty($prezime)){
    
    $errors['prezime']="Morate uneti prezime vozaca";
    
    }
    
    if(empty($godiste)){
    
    $errors['godiste']="Morate uneti godiste vozaca";
    
    
    }
    
    
    if(count($errors)==0){
    
    $dao=new DAO();  
    
    $dao->izmenaVozaca($ime,$prezime,$godiste,$idvozaca);

    $vozac=$dao->prikazVozacaPoIdu($idvozaca);
    
    $msg="Uspesna izmena";
    
    include 'izmenavozaca.php';

    }else{


    }



 }


 
 public function login(){

 $username=isset($_POST['username'])?$_POST['username']:"";
 $password=isset($_POST['password'])?$_POST['password']:"";

 if(!empty($username)&& !empty($password)){

 $dao=new DAO();

 $korisnik=$dao->login($username,$password);

 if($korisnik){

 session_start();

 $_SESSION['ulogovan']=$korisnik;

 header("Location:index.php");

 }else{

 $msg="Morate uneti ispravan username i password";

 include 'login.php';




 }



 }else{

 $msg="Morate uneti username i password";

 include 'login.php';



 }



 }

  public function registracija(){

 $ime=isset($_POST['ime'])?$_POST['ime']:"";
 $prezime=isset($_POST['prezime'])?$_POST['prezime']:"";
 $email=isset($_POST['email'])?$_POST['email']:"";
 $datum=isset($_POST['datum'])?$_POST['datum']:"";
 $username=isset($_POST['username'])?$_POST['username']:"";
 $password=isset($_POST['password'])?$_POST['password']:"";


 $errors=array();

 if(empty($ime)){

 $errors['ime']="Morate uneti ime";

 }

 if(empty($prezime)){

 $errors['prezime']="Morate uneti prezime";
   
    }

 if(empty($email)){

$errors['email']="Morate uneti email";
       
  }

  if(empty($datum)){

 $errors['datum']="Morate uneti datum";
       
  }

  if(empty($username)){

$errors['username']="Morate uneti username";
       
  }

if(empty($password)){

$errors['password']="Morate uneti password";
       
  }

 if(count($errors)==0){

 $dao=new DAO();

 $registracija=$dao->registracija($ime,$prezime,$email,$datum,$username,$password);


 $msg="Korisnik registrovan";

 include 'registracija.php';
 
 
}else{

 $msg="Morate popuniti sva polja korektno";
 include 'registracija.php';

 }


  }

 public function logout(){

 session_start();

 session_unset();

 session_destroy();

 include 'login.php';


 }
  





















}

?>




























