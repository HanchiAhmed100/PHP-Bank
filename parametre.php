<?php include_once'assets/nav.php';include_once'assets/rederiction.php' ; include_once'classe/login.class.php' ; $erreur =""; $dbmail =""?>
<div class="container">
  <div class="row">
  	<div class="col-sm-6 col-sm-offset-3">

  		<form method="post" class="input-group well">
  			<div class="col-sm-12 form-group">
      			<h3 class="text-center" style="color: black"> Creer un compte pour un employer</h3>
  			</div>
  			<div class="col-sm-12 form-group">
  				<input type="text" class="form-control" name="nom" placeholder="Nom : ">
  			</div>
  			<div class="col-sm-12 form-group">
  				<input type="text" class="form-control" name="prenom" placeholder="Prenom : ">
  			</div>
  			<div class="col-sm-12 form-group">
  				<input type="mail" class="form-control" name="mail" placeholder="Adresse mail : ">
  			</div>
  			<div class="col-sm-12 form-group">
  				<input type="password" class="form-control" name="motdepasse" placeholder="mot de passe : ">
  			</div>
        <div class="col-sm-6 form-group">
          <label style="color: black">Utilisateur &nbsp;</label><input type="radio" name="poste" value="utilisateur">
        </div>
        <div class="col-sm-6 form-group">
          <label style="color: black">Admin &nbsp;</label><input type="radio" name="poste" value="admin">
        </div>
  			<div class="col-sm-12 form-group">
  				<input type="submit" name="envoyer" class="form-control">
  			</div>
  		</form> 
  	</div>
</div>
</div>
<?php include_once'assets/footer.php' ;
	if(!empty($_POST['envoyer'])){
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$motdepasse = $_POST['motdepasse'];
    $poste = $_POST['poste'];
		$employer = new login();
		$check = $employer->verifco($mail);
		while($re = $check->fetch()){
      $dbmail = $re['mail'];
		}
    if($dbmail == $mail){
        #<script>alerte( "adresse existe deja !") </script>;
    }
    else{
      $employer->createmp($nom,$prenom,$mail,$motdepasse,$poste);
      header('location:index.php');
    } 
	}
?>
