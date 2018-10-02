
<?php include_once'assets/nav.php';include_once'assets/rederiction.php' ;include_once'classe/compte.class.php ';include_once'classe/transaction.class.php ' ; include_once'classe/conn.class.php ' ?>
<style type="text/css">
  body{background: url(images/money.jpg);background-size: cover;}
</style>
<div class="container">
  <div class="row">   
    <div class="col-sm-3">
      <a  href="creetransaction.php" class="btn"> Cree une nouvelle transaction </a>
    </div>
    <div class="col-sm-3">
      <a class="btn" id="show"> Voir les compte </a>
    </div>
    <div class="col-sm-6">
    <form method="post">
      <div class="row">
        <div class="col-sm-8">
          <input type="Search" class="form-control" name="res" placeholder="Donner le titulaire rechercher">
        </div>
        <div class="col-sm-4">
          <input type="submit" class="btn btn-block" name="shearchclient">
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="col-sm-12">                        
  <div class="table-responsive" id="compte">          
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Titulaire</th>
          <th>Solde</th>
          <th>Devise</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      	<?php  
          $compte = new Compte();
      		$result = $compte->allcompte();
      		while($r = $result->fetch()){
      			echo '<tr>';
      				echo "<td>".$r['id']."</td>
				          <td>".$r['titulaire']."</td>
				          <td>".$r['solde']."</td>
                  <td>".$r['devise']."</td>
						      <td><a href=\"creetransaction.php?transaction=".$r['id']."\"><i class=\"white\">Transaction </i></a></td>
						  </tr>";
			}
		?>
      </tbody>
    </table>
  </div>
    <div class="diveur1 table-responsive">

      <TABLE class="table">
          <?php 
            if(!empty($_POST['shearchclient'])){
              $titulaire = $_POST['res'];
              $compte = new transaction();
              $result = $compte->recuper($titulaire);
              while($r = $result->fetch()){
                echo '<th><td><h3 class="text-center">Le compte rechercher :</h3><td></th><tr>';
                echo "<td>id : ".$r['id']."</td>
                    <td>Titulaire : ".$r['titulaire']."</td>
                    <td>Solde : ".$r['solde']."</td>
                    <td>Devise : ".$r['devise']."</td>
                    <td><a href=\"creevirment.php?virment=".$r['id']."\"><i class=\"white\"> virment </i></a></td>
                </tr>";
                }
            } 
          ?>
      </TABLE>
      <table class="table">
      <thead>
        <tr>
          <th>Id Transaction</th>
          <th>id client</th>
          <th>type</th>
          <th>Somme</th>
          <th>Au benefice de</th>
          <th>Date de la transaction</th>
          <th>Responsable</th>
        </tr>
      </thead>
      <tbody>
        <?php  
          $Transaction = new transaction();
          $result = $Transaction->alltransaction();
          while($r = $result->fetch()){
            echo '<tr>';
              echo "<td>".$r['id']."</td>
                  <td>".$r['idclient']."</td>
                  <td>".$r['type']."</td>
                  <td>".$r['somme']."</td>
                  <td>".$r['benefice']."</td>
                  <td>".$r['datedetransaction']."</td>
                  <td>".$r['responsable']."</td>
              </tr>";
      }
    ?>
      </tbody>
    </table>

    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $("#compte").hide();
    $("#show").click(function(){
        $("#compte").toggle();
    });
});
</script>
<?php include_once'assets/footer.php' ; ?>