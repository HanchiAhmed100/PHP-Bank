
<?php include_once'assets/nav.php';include_once'assets/rederiction.php';include_once'classe/compte.class.php' ; include_once'classe/conn.class.php'; 
            if (isset($_GET['update'])) {
            $id = $_GET['update'];
            $compte = new compte();
            $result = $compte->recuper($id);
              while($re = $result->fetch()){
                $titulaire = $re['titulaire'];
                $solde = $re['solde'];
                $devise = $re['devise'];
                $datecre =  $re['datecre'];
              }
            }
?>
<style type="text/css">
  body{background: url(images/billets.jpg);background-size: cover;}
</style>

<div class="container">
  <div class="row">

    <div class="col-sm-6 col-sm-offset-3">
      <form class="input-group well" method="post">
        <div class="col-sm-12 form-group">
            <h3 class="text-center" style="color: black">Vous voulez modifier ce compte :</h3>
        </div>
        <div class="col-sm-12 form-group">
          <input type="text" class="form-control" name="titulaire" value="<?php echo $titulaire ?>">
        </div>
        <div class="col-sm-12 form-group">
          <input type="text" class="form-control" name="solde" value="<?php echo $solde ?>">
        </div>
        <div class="col-sm-12 form-group">
          <label style="color: black">La devise est en :<?php echo $devise ?></label>
          <select name="devise" class="form-control">
            <option value="TND">TND</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
          </select>
        </div>
        <div class="col-sm-12 form-group">
          <input type="date" class="form-control" name="datecre" value="<?php echo $datecre ?>">
        </div>
        <div class="col-sm-12 form-group">
          <input type="submit" class="form-control" name="modifier">
        </div>
      </form>
    </div>
  </div>
</div>
<?php include_once'assets/footer.php' ?>
  <?php 
  if(!empty($_POST['modifier'])){
    $id = $_GET['update'];
    $titulaire = $_POST['titulaire'];
    $solde = $_POST['solde'];
    $devise = $_POST['devise'];
    $datecre = $_POST['datecre'];
    $compte = new Compte();
    $compte->modifier($titulaire,$solde,$devise,$datecre,$id);
    header('location:compte.php');
  }
?>