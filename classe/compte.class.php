<?php
	include_once 'conn.class.php';
 	class compte{	

 	 	private $conn;

	  	public function __construct(){
 	 		$db = new conn;
          	$connect = $db->connect();
          	$this->conn = $connect;
 	 	}
 	 	public function insert($titulaire,$solde,$devise,$datecre,$responsable){
 	 		$id = mt_rand(9999999999,100000000000);
          	$codeBank = mt_rand(9999,100000);
          	$codeGuichet = mt_rand(9999,100000);
          	$clerib = mt_rand(9,100);
 	 		$req = $this->conn->query("INSERT INTO compte (id,codeb,codeg,rib,titulaire,solde,devise,datecre,responsable) VALUES ('$id','$codeb','$codeGuichet','$clerib','$titulaire','$solde','$devise','$datecre','$responsable')");
 	 	}	
 	 	public function supprimer($id){
 	 		$nb_supp = $this->conn->query("DELETE FROM compte WHERE id='".$id."' ");
 	 	}
 	 	public function recuper($id){
 	 		$reponse = $this->conn->query('SELECT * FROM compte WHERE id = "'.$id.'" ');
 	 		return $reponse;
 	 	}
 	 	public function allcompte(){
              $sql =$this->conn->query("SELECT * FROM compte");
              return $sql;
 		} 
  	 	public function modifier($titulaire,$solde,$devise,$datecre,$id){
 	 		$nb_modifs = $this->conn->query("UPDATE compte SET titulaire='$titulaire',solde='$solde',devise='$devise',datecre='$datecre' WHERE id = \"".$id."\" ");
 	 	}
 	}	
?>
