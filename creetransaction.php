<?php include_once'assets/nav.php';include_once'assets/rederiction.php';include_once'classe/compte.class.php' ;include_once'classe/transaction.class.php'; include_once'classe/conn.class.php';
                $titulaire = $solde = $devise ="";
            if (isset($_GET['transaction'])) {
            $id = $_GET['transaction'];
            $compte = new compte();
            $result = $compte->recuper($id);
              while($re = $result->fetch()){
                $titulaire = $re['titulaire'];
                $solde = $re['solde'];
                $devise = $re['devise'];
              }
            }
?>
<style type="text/css">
  body{background: url(images/money.jpg);background-size: cover;}
</style>
<div class="container">
	<div class="row">

	    <div class="col-sm-6 col-sm-offset-3">
		    <form class="input-group well text-center" method="post">
		    	<div class="col-sm-12 form-group">
		      		<h3 style="color: black">Vous voulez cree une transaction de :</h3>
		      	</div>
		      	<div class="col-sm-4 form-group">
		      		<label style="color: black"> Retrait &nbsp; &nbsp; </label><input type="radio" name="trans" id="a" value="Retrait">
		      	</div>
		      	<div class="col-sm-4 form-group">
		      		<label style="color: black" > Versement &nbsp; &nbsp;</label><input type="radio" name="trans" id="b" value="Versement">
		      	</div>
		      	<div class="col-sm-4 form-group">
		      		<label style="color: black" > Virement &nbsp; &nbsp;</label><input type="radio" name="trans" id="c" value="Virement">
		      	</div>
				<div class="col-sm-3 form-group">
			      	<label style="color: black" > Titulaire : </label>
			    </div>
			    <div class="col-sm-9 form-group">
			    	<input type="" name="titulaire" class="form-control" value="<?php echo $titulaire ?>">
			    </div>
			    <div class="col-sm-3 form-group">
			      	<label style="color: black" > Solde :</label>
			    </div>
			    <div class="col-sm-9 form-group">
			        <input type="text" class="form-control" name="solde" value=" <?php echo $solde ?>">
			    </div>
			    <div class="col-sm-3 form-group">
			      	<label style="color: black"> Somme de la transaction :</label>
			    </div>
			    <div class="col-sm-9 form-group">
			        <input type="text" class="form-control" name="somme">
			    </div>
			    <div class="row" id="ben">
				    <div class="col-sm-12 form-group">
				    	<select name="benefice" class="form-control">
				    		<option> Au benefice de :</option>
				    		<?php
				    			$compte = new compte();
				    			$result = $compte->allcompte();
             						while($re = $result->fetch()){
			                  		echo "<option value=".$re['titulaire'].">".$re['titulaire']."</option>";
			                  	}
				    		?>
				    	</select>
				    </div>
			   	</div>
			    <div class="col-sm-12 form-group">
			    	<input type="submit" class="form-control" name="valider">
			    </div>
		    </form>
	    </div>
  	</div>
</div>
<script>
$(document).ready(function(){
	$("#ben").hide();
    $("#c").click(function(){
        $("#ben").show();
    });
    $("#a").click(function(){
        $("#ben").hide();
    });
     $("#b").click(function(){
        $("#ben").hide();
    });
});
</script>
<?php 

if(!empty($_POST['valider'])){
	  	$titulaire = $_POST['titulaire'];
	  	$solde = $_POST['solde'];
	  	$trans = $_POST['trans'];
	  	$somme = $_POST['somme'];
	  	$responsable = $_SESSION['nom']." ".$_SESSION['prenom'];
		$datedetransaction = date('Y-m-d H:i:s');
		if(!$_POST['benefice'] == ''){
			$transaction = new transaction();
			if($trans == "Retrait"){
				$solde = $solde - $somme;
				$benefice = "client";
				$transaction->transaction($solde,$id,$trans,$somme,$benefice,$datedetransaction,$responsable);
				header('location:transaction.php');
			}
			if($trans == "Versement"){
			$solde = $solde + $somme;
			$benefice = "la banque";
			$transaction->transaction($solde,$id,$trans,$somme,$benefice,$datedetransaction,$responsable);
			header('location:transaction.php');
			} 
			if($trans == "Virement"){
				$solde = $solde - $somme;
			  	$benefice = $_POST['benefice'];
		 		$result = $transaction->virment($benefice);
		            while($re = $result->fetch()){
		            $idB = $re['id'];
		            $sol = $re['solde'];
		        }
	       	$sol += $somme;
	       	$transaction->val($idB,$sol);
			$transaction->transaction($solde,$id,$trans,$somme,$benefice,$datedetransaction,$responsable);
			header('location:transaction.php');
		}
	} 	 	
}
?>
<?php include_once'assets/footer.php' ?>
