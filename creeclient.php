<?php include_once'assets/nav.php';include_once'assets/rederiction.php' ;include_once'classe/cree.class.php' ; include_once'classe/conn.class.php' ?>
<style type="text/css">
  body{background: url(images/online-banking.jpg);background-size: cover;}
</style>
<div class="container">
	<div class="row">
    	<div class="col-sm-6 col-sm-offset-3">
		    <form class="input-group well" method="post">
		    <div class="col-sm-12">
	    		<h3 class="text-center" style="color: black">Vous voulez cree un compte :</h3>
	    	</div>    
		      <div class="col-sm-12 form-group">
		        <input type="text" class="form-control" name="nom" placeholder="Nom">
		      </div>
		      <div class="col-sm-12 form-group">
		        <input type="text" class="form-control" name="prenom" placeholder="Prenom">
		      </div>
		      <div class="col-sm-12 form-group">
		        <input type="date" class="form-control" name="date" placeholder="">
		      </div>
		      <div class="col-sm-6 form-group">
		        <input type="number" class="form-control" name="telephone" placeholder="Telephone">
		      </div>
		      <div class="col-sm-6 form-group">
		        <input type="text" class="form-control" name="adress" placeholder="Adresse">
		      </div>
		      <div class="col-sm-6 form-group">
		        <input type="submit" class="form-control" name="submit">
		      </div>
		      <div class="col-sm-6 form-group">
		        <input type="reset" class="form-control" name="">
		      </div>
	    	</form>
    	</div>
  	</div>
</div>
<?php include_once'assets/footer.php' ?>
<?php 
if(!empty($_POST['submit'])){
	  $nom = $_POST['nom'];
	  $prenom = $_POST['prenom'];
	  $daten = $_POST['date'];
	  $adress = $_POST['adress'];
	  $tel = $_POST['telephone'];
	  $responsable = $_SESSION['nom']." ".$_SESSION['prenom'];
	$client = new Cree();
	$client->insert($nom,$prenom,$daten,$adress,$tel,$responsable);
	header('location:client.php');
    }
?>