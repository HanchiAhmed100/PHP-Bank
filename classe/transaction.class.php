<?php
	include_once 'conn.class.php';
 	class transaction{	
 	 	private $conn;
	  	public function __construct(){
 	 		$db = new conn;
          	$connect = $db->connect();
          	$this->conn = $connect;
 	 	}
  public function transaction($solde,$id,$type,$somme,$benefice,$datedetransaction,$responsable){
      $sol = $this->conn->query("UPDATE compte  SET solde='$solde' WHERE id = \"".$id."\"");
      $req = $this->conn->query("INSERT INTO transaction (idclient,type, somme, benefice,datedetransaction,responsable) VALUES ('$id','$type', '$somme', '$benefice','$datedetransaction','$responsable')");
    }
    public function alltransaction(){
      $sql =$this->conn->query("SELECT * FROM transaction");
      return $sql;
    } 
    public function virment($titulaire){
      $reponse = $this->conn->query('SELECT * FROM compte WHERE titulaire = "'.$titulaire.'" ');
      return $reponse;
    }
    public function val($id,$solde){
     $req = $this->conn->query("UPDATE compte  SET solde='$solde' WHERE id = \"".$id."\"");
    }
    public function recuper($titulaire){
      $reponse = $this->conn->query('SELECT * FROM compte WHERE titulaire = "'.$titulaire.'" ');
      return $reponse;
    }


 	}	
?>
