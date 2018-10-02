
<?php include_once'assets/nav.php';include_once'assets/rederiction.php' ;include_once'classe/compte.class.php ' ; include_once'classe/conn.class.php ';?>
<style type="text/css">
  body{background: url(images/billets.jpg);background-size: cover;}
</style>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <a  href="creecompte.php" class="btn"> Cree un nouveau compte</a>
    </div>
    <div class="col-sm-6">
    <form method="post">
      <div class="row">
        <div class="col-sm-8">
          <input type="Search" class="form-control" name="res" placeholder="Donner l'id du compte rechercher">
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
  <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Code Banque</th>
          <th>Code Guichet</th>
          <th>RIB</th>
          <th>Titulaire</th>
          <th>Solde</th>
          <th>Devise</th>
          <th>Date de Creation </th>
          <th>Action</th>
          <th>Responsable</th>
        </tr>
      </thead>
      <tbody>
      	<?php  
          $compte = new Compte();
      		$result = $compte->allcompte();
      		while($r = $result->fetch()){
      			echo '<tr>';
      				echo "<td>".$r['id']."</td>
				          <td>".$r['codeb']."</td>
				          <td>".$r['codeg']."</td>
				          <td>".$r['rib']."</td>
				          <td>".$r['titulaire']."</td>
				          <td>".$r['solde']."</td>
                  <td>".$r['devise']."</td>
                  <td>".$r['datecre']."</td>
						  <td>
						  	<a href=\"modifercompte.php?update=".$r['id']."\"><i class=\"fa fa-pencil white\">up</i></a>
						   	&nbsp; 
                <a href=\"?supprimer=".$r['id']."\"><i class=\"fa fa-trash white\">su</i></a>
						  <td>".$r['responsable']."</td>
              </tr>";
			}
		?>
      </tbody>
    </table>
    <div class="diveur1 table-responsive">

      <TABLE class="table">
          <?php 
            if(!empty($_POST['shearchclient'])){
              $id = $_POST['res'];
              $compte = new Compte();
              $result = $compte->recuper($id);
              while($r = $result->fetch()){
                echo '<th><td><h3 class="text-center">Le compte rechercher :</h3><td></th><tr>';
                echo "<td>id : ".$r['id']."</td>
                    <td>Code Banque : ".$r['codeb']."</td>
                    <td>Code Guichet : ".$r['codeg']."</td>
                    <td>RIB : ".$r['rib']."</td>
                    <td>Titulaire : ".$r['titulaire']."</td>
                    <td>Solde : ".$r['solde']."</td>
                    <td>Devise : ".$r['devise']."</td>
                    <td>Date de creation : ".$r['datecre']."</td>
                <td>
                  <a href=\"modifercompte.php?update=".$r['id']."\"><i class=\"fa fa-pencil white\">up</i></a>
                  &nbsp; 
                  <a href=\"?supprimer=".$r['id']."\"><i class=\"fa fa-trash white\">su</i></a>
                  <td>Le responsable".$r['responsable']."</td>
                </tr>";
                }
            } 
          ?>
          <?php
           if (isset($_GET['supprimer'])) {
            $compte = new compte();
            $compte->supprimer($_GET['supprimer']); 
          }
          ?>
      </TABLE>
    </div>
  </div>
</div>
<?php include_once'assets/footer.php' ; ?>