<?php include_once 'conn.class.php';
 	class login{	
 	 	private $conn;
	  	public function __construct(){
 	 		$db = new conn;
          	$connect = $db->connect();
          	$this->conn = $connect;
 	 	}
 	 	public function createmp($nom,$prenom,$mail,$motdepasse,$poste){
 	 		$req = $this->conn->query("INSERT INTO employer (nom,prenom,mail,motdepasse,poste) VALUES ('$nom','$prenom','$mail','$motdepasse','$poste')");
 	 	}
 	 	public function verifco($mail){
 	 		$checkmail = $this->conn->query('SELECT * FROM employer WHERE mail = "'.$mail.'" ');
 	 		return $checkmail;
 	 	}
 	}
?>