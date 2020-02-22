
<?php
require_once('../config/db.php');

class DAO{

    private $db;

  private $PRIKAZPROIZVODJACA="SELECT * FROM proizvodjaci";
  private $PRIKAZKATEGORIJA="SELECT * FROM kategorije";
  private $UNOSVOZILA="INSERT INTO vozila (imeproizvodjaca,model,kategorija,godiste,cena) VALUES(?,?,?,?,?)";
  private $UNOSVOZACA="INSERT INTO vozaci(ime,prezime,godiste)VALUES (?,?,?)" ;
  private $PRIKAZVOZILA="SELECT * FROM vozila";
  private $PRIKAZVOZACA="SELECT * FROM vozaci";
  private $ZADUZENJE="INSERT INTO vozilavozaci(idvozila,idvozaca)VALUES(?,?)";
  private $OBRISIVOZILO="DELETE FROM vozila WHERE idvozila=?";
  private $OBRISIVOZACA="DELETE FROM vozaci WHERE idvozaca=?";
  private $PRIKAZVOZILAPOIDU="SELECT * FROM vozila WHERE idvozila=?";
  private $IZMENAVOZILA="UPDATE vozila SET imeproizvodjaca=?,model=?,kategorija=?,godiste=?,cena=? WHERE idvozila=?";
  private $PRIKAZVOZACAPOIDU="SELECT * FROM vozaci WHERE idvozaca=?";
  private $IZMENAVOZACA="UPDATE vozaci SET ime=?,prezime=?,godiste=? WHERE idvozaca=?";
  private $LOGIN="SELECT * FROM korisnici WHERE username=? AND password=?";
  private $REGISTRACIJA="INSERT INTO korisnici (ime,prezime,email,datum_rodjenja,username,password)VALUES(?,?,?,?,?,?)";
  
  public function __construct(){
        $this->db=DB::createInstance();
    }

    public function prikazSvihProizvodjaca(){
    $statement = $this->db->prepare($this->PRIKAZPROIZVODJACA);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}

public function prikazSvihKategorija(){
    $statement = $this->db->prepare($this->PRIKAZKATEGORIJA);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}
 

public function unosVozila($i,$m,$k,$g,$c){
    $statement = $this->db->prepare($this->UNOSVOZILA);
        $statement->bindValue(1,$i);
        $statement->bindValue(2,$m);
        $statement->bindValue(3,$k);
        $statement->bindValue(4,$g);
        $statement->bindValue(5,$c);

    $statement->execute();
   
}

public function unosVozaca($im,$pr,$go){

 $statement=$this->db->prepare($this->UNOSVOZACA);
 $statement->bindValue(1,$im);
 $statement->bindValue(2,$pr);
 $statement->bindValue(3,$go);

 $statement->execute();



}

public function prikazSvihVozila(){

$statement=$this->db->prepare($this->PRIKAZVOZILA);

$statement->execute();

$result=$statement->fetchAll();

return $result;




}

public function prikazSvihVozaca(){

    $statement=$this->db->prepare($this->PRIKAZVOZACA);
    
    $statement->execute();
    
    $result=$statement->fetchAll();
    
    return $result;
    
}


public function zaduzenje($idvozila,$idvozaca){

    $statement=$this->db->prepare($this->ZADUZENJE);
    $statement->bindValue(1,$idvozila);
    $statement->bindValue(2,$idvozaca);
   
   
    $statement->execute();
   
   
   
   }
   
 public function obrisiVozilo($id){
 
 $statement=$this->db->prepare($this->OBRISIVOZILO);
 $statement->bindValue(1,$id);
 
 $statement->execute();



 }


 public function obrisiVozaca($id){
 
    $statement=$this->db->prepare($this->OBRISIVOZACA);
    $statement->bindValue(1,$id);
    
    $statement->execute();
   


}

public function prikazVozilaPoIdu($id){

$statement=$this->db->prepare($this->PRIKAZVOZILAPOIDU);

$statement->bindValue(1,$id);

$statement->execute();

$result=$statement->fetchAll();

return $result;



}

public function izmenaVozila($i,$m,$k,$g,$c,$id){

$statement=$this->db->prepare($this->IZMENAVOZILA);

$statement->bindValue(1,$i);
$statement->bindValue(2,$m);
$statement->bindValue(3,$k);
$statement->bindValue(4,$g);
$statement->bindValue(5,$c);
$statement->bindValue(6,$id);


$statement->execute();



}

public function prikazVozacaPoIdu($i){

$statement=$this->db->prepare($this->PRIKAZVOZACAPOIDU);

$statement->bindValue(1,$i);

$statement->execute();

$result=$statement->fetchAll();

return $result;


}

public function izmenaVozaca($i,$p,$g,$id){

$statement=$this->db->prepare($this->IZMENAVOZACA);

$statement->bindValue(1,$i);
$statement->bindValue(2,$p);
$statement->bindValue(3,$g);
$statement->bindValue(4,$id);

$statement->execute();



}

public function login($u,$p){

$statement=$this->db->prepare($this->LOGIN);

$statement->bindValue(1,$u);
$statement->bindValue(2,$p);

$statement->execute();


$result=$statement->fetch();

return $result;





}


public function registracija($i,$p,$e,$d,$u,$pw){

$statement=$this->db->prepare($this->REGISTRACIJA);

$statement->bindValue(1,$i);
$statement->bindValue(2,$p);
$statement->bindValue(3,$e);
$statement->bindValue(4,$d);
$statement->bindValue(5,$u);
$statement->bindValue(6,$pw);

$statement->execute();



}








}


?>



























