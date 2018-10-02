
<?php include_once'assets/nav.php';include_once'assets/rederiction.php' ;include_once'classe/cree.class.php ' ; include_once'classe/conn.class.php ';?>
<style type="text/css">
  body{background: url(images/online-banking.jpg);background-size: cover;}
</style>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <a  href="creeclient.php" class="btn"> Cree un nouveau compte</a>
    </div>
    <div class="col-sm-6">
    <form method="post">
      <div class="row">
        <div class="col-sm-8">
          <input type="Search" class="form-control" name="res" placeholder="Donner l'id du client rechercher">
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
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date de naissance</th>
          <th>Adress</th>
          <th>Tel</th>
          <th>Action</th>
          <th>Responsable</th>
        </tr>
      </thead>
      <tbody>
      	<?php  
      		$client = new cree();
      		$result = $client->allclient();
      		while($r = $result->fetch()){
      			echo "<tr>";
      				echo "<td>".$r['id']."</td>
				          <td>".$r['nom']."</td>
				          <td>".$r['prenom']."</td>
				          <td>".$r['daten']."</td>
				          <td>".$r['adress']."</td>
				          <td>".$r['tel']."</td>
						  <td>
						  	<a href=\"modiferclient.php?update=".$r['id']."\" ><i class=\"fa fa-pencil white\">up</i></a>
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
              $cli = new cree();
              $result = $cli->recuper($id);
              while($re = $result->fetch()){
                echo '<th><td><h3 class="text-center">Le client rechercher :</h3><td></th>
                  <tr>';
                  echo "<td>".$re['id']."</td>
                      <td>".$re['nom']."</td>
                      <td>".$re['prenom']."</td>
                      <td>".$re['daten']."</td>
                      <td>".$re['adress']."</td>
                      <td>".$re['tel']."</td>
                  <td>

                    <a href=\"modiferclient.php?update=".$re['id']."\"><i class=\"fa fa-pencil white\">up</i></a>
                    &nbsp;
                    <a href=\"?supprimer=".$re['id']."\"><i class=\"fa fa-trash white\">su</i></a>
                  <td>Le responsable :".$r['responsable']."</td>
                  </tr>";
                }
            } 
          ?>
          <?php
           if (isset($_GET['supprimer'])) {
            $cli = new cree();
            $cli->supprimer($_GET['supprimer']); 
          }
          ?>
      </TABLE>
    </div>
  </div>
</div>
<?php include_once'assets/footer.php' ; ?>