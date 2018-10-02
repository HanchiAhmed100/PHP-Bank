
<?php include_once'assets/nav.php';include_once'assets/rederiction.php';include_once'classe/cree.class.php' ; include_once'classe/conn.class.php'; 
           if (isset($_GET['update'])) {
            $id = $_GET['update'];
            $cli = new cree();
            $result = $cli->recuper($id);
              while($re = $result->fetch()){
                $nom = $re['nom'];
                $prenom = $re['prenom'];
                $date = $re['daten'];
                $adress =  $re['adress'];
                $tel = $re['tel'];
              }
            }
?>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <form class="input-group well" method="post">
        <div class="col-sm-12">
          <div class="col-sm-12 form-group">
            <h3 class="text-center" style="color: black">Vous voulez modifier ce client :</h3>
          </div>
        </div>
        <div class="col-sm-12 form-group">
          <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo $nom ?>">
        </div>
        <div class="col-sm-12 form-group">
          <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $prenom ?>">
        </div>
        <div class="col-sm-12 form-group">
          <input type="date" class="form-control" name="date" placeholder="" value="<?php echo $date ?>">
        </div>
        <div class="col-sm-6 form-group">
          <input type="text" class="form-control" name="telephone" placeholder="Telephone" value="<?php echo $tel ?>">
        </div>
        <div class="col-sm-6 form-group">
          <input type="text" class="form-control" name="adress" placeholder="Adresse" value="<?php echo $adress ?>">
        </div>
        <div class="col-sm-6 form-group">
          <input type="submit" class="form-control" name="modifier">
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
  if(!empty($_POST['modifier'])){
    $id = $_GET['update'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $daten = $_POST['date'];
    $adress = $_POST['adress'];
    $tel = $_POST['telephone'];
    $client = new Cree();
    $client->modifier($nom,$prenom,$daten,$adress,$tel,$id);
    header('location:client.php');
  }
?>




