<?php include_once'assets/nav.php' ;include_once'classe/compte.class.php' ;include_once'assets/rederiction.php';include_once'classe/conn.class.php' ?>
<style type="text/css">
  body{background: url(images/billets.jpg);background-size: cover;}
</style>
<div class="container">
	<div class="row">
	    <div class="col-sm-6 col-sm-offset-3">
		    <form class="input-group well" method="post">
		    	<div class="col-sm-12">
            		<h3 class="text-center" style="color: black">Vous voulez cree un compte :</h3>
    			</div>
		      	<div class="col-sm-12 form-group">
		        	<input type="text" class="form-control" name="titulaire" placeholder="Titulaire">
		      	</div>
		      	<div class="col-sm-12 form-group">
		        	<input type="text" class="form-control" name="solde" placeholder="Solde">
		      	</div>
		      	<div class="col-sm-12 form-group">
		        	<select name="devise" class="form-control">
		        		<option value="TND">TND</option>
		        		<option value="USD">USD</option>
		        		<option value="EUR">EUR</option>
		        	</select>
		      	</div>
		      	<div class="col-sm-12 form-group">
		        	<input type="date" class="form-control" name="datecre" placeholder="Date de creation">
		      	</div>
		      	<div class="col-sm-12 form-group">
		        	<input type="submit" class="form-control" name="valider">
		      	</div>
		    </form>
	    </div>
  	</div>
</div>
<?php include_once'assets/footer.php' ?>
<?php 
if(!empty($_POST['valider'])){
	  $titulaire = $_POST['titulaire'];
	  $solde = $_POST['solde'];
	  $devise = $_POST['devise'];
	  $datecre = $_POST['datecre'];
	  $responsable = $_SESSION['nom']." ".$_SESSION['prenom'];
	$compte = new Compte();
	$compte->insert($titulaire,$solde,$devise,$datecre,$responsable);
	header('location:compte.php');
    }
?>