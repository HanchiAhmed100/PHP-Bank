<?php 
	if(empty($_SESSION['nom'])){
		header('location:login.php');
	}
?>