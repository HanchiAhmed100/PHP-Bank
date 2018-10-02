<div style=" position: fixed;bottom: 0PX;background: rgba(0,0,0,0.7); color: white; width: 100% ;height: 50px; margin-top:50px; border-top: #000 2px solid">
	<div class="col-sm-4"> 
		<h4 class="text-center">LA BANQUE &copy All right reserved </h4>
	</div>
	<div class="col-sm-7"> 
		<h4 class="text-center">
			Session ouverte au nom de : 
			<?php echo $_SESSION['nom']."&nbsp ".$_SESSION['prenom']."&nbsp";
			if($_SESSION['poste'] == "admin"){
				echo '(Admin)&nbsp &nbsp <a href="parametre.php">Ajouter un utilisateur &nbsp;';
			}else{
				echo "(utilisateur)";
			}
			?> 
		</h4>
	</div>
	<div class="col-sm-1"> 
		<h4><a href="assets/logout.php">logout &nbsp;<i class="fa fa-lock"></i></a></h4>
	</div>
 </div>
</body>
<script type="text/javascript" src="assets/bootstrap.min.js"></script>
</html>