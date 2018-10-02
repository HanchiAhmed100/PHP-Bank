<!DOCTYPE html>
<?php include_once'classe/login.class.php' ;include_once'assets/rederictionin.php' ?>
<head>
  <title></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div class="container">
	<div class="row ">
		<div class="col-sm-4 col-sm-offset-4 diveur2">
			<form method="post" class="input-group diveur">
				<div class="row">
					<div class="col-xs-12"><h3> Connecter à votre Compte </h3></div>
					<div class="col-xs-12">
						<LABEL for="id">&nbsp;</LABEL>
						<input type="text" name="mail" placeholder="Adresse mail" class="form-control">
					</div>
					<div class="col-xs-12">
						<LABEL for="pass">&nbsp;</LABEL>
						<input type="password" name="pass" placeholder="Mot de passe" class="form-control">
					</div>
					<div class="col-xs-6">
						<LABEL for="sub">&nbsp;</LABEL>
						<input type="submit" name="sub" class="btn btn-block">
					</div>
					<div class="col-xs-6">
						<LABEL for="res">&nbsp;</LABEL>
						<input type="reset" name="res" class="btn btn-block">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
	if(!empty($_POST['sub'])){
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		$dbmail ="";
		$employer = new login();
		$check = $employer->verifco($mail);
		while($re = $check->fetch()){
      		$dbmail = $re['mail'];
      		$dbpass = $re['motdepasse'];
      		$nom =$re['nom'];
      		$prenom =$re['prenom'];
      		$post =$re['poste'];
		}
    	if($dbmail == $mail){
        	if($dbpass == $pass){
        		session_start();
        		$_SESSION['nom'] = $nom;
        		$_SESSION['prenom'] = $prenom;
        		$_SESSION['poste'] = $post;
        		header('location:index.php');
        	}
    	}
	}
?>
