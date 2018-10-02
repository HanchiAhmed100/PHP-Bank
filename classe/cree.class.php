<?php
	include_once 'conn.class.php';
 	class cree{	
 	 	private $nom;
 	 	private $prenom;
 	 	private $adress;
 	 	private $daten;
 	 	private $tel;
 	 	private $conn;

	  	public function __construct(){
 	 		$db = new conn;
          	$connect = $db->connect();
          	$this->conn = $connect;
 	 	}
 	 	public function insert($nom,$prenom,$daten,$adress,$tel,$responsable){
 	 		$req = $this->conn->query("INSERT INTO client (nom, prenom, daten, adress, tel,responsable) VALUES ('$nom','$prenom','$daten','$adress','$tel','$responsable')");
 	 	}	
 	 	public function supprimer($id){
 	 		$nb_supp = $this->conn->query("DELETE FROM client WHERE id='".$id."' ");
 	 	}
 	 	public function recuper($id){
 	 		$reponse = $this->conn->query('SELECT * FROM client WHERE id = "'.$id.'" ');
 	 		return $reponse;
 	 	}
 	 	public function allclient(){
              $sql =$this->conn->query("SELECT * FROM client");
              return $sql;
 		} 
  	 	public function modifier($nom,$prenom,$tel,$adress,$daten,$id){
 	 		$nb_modifs = $this->conn->query("UPDATE client SET nom='$nom',prenom='$prenom',tel='$tel',adress='$adress' WHERE id = \"".$id."\" ");
 	 	}
 	}	
?>
