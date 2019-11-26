<?php
$title = 'Profil';
ob_start();?>

<?php 
$prizeController = new prizeController;
$userPrizes = $prizeController->allWonPrizes();
// var_dump($userPrizes);
?>

<h2>Profil Utilisateur</h2>

<div class="container">
	<p class="welcome">Bonjour <?=$_SESSION['fname']?></p>
	<p>Votre adresse mail est <?=$_SESSION['mail']?></p>
	<p>Vous vous êtes inscrit le <?= $_SESSION['date']?></p>
<div class="deja"></div>
	<div>
		<h3 class="titre3">Vos lots gagnés</h3>
		<ul>
			<?php
			for($i = 0; $i < count($userPrizes); $i++){
			?>
			<li class="histo">Le <?= $userPrizes[$i]['PRI_DATESELECTED']?>, vous avez gagné <?= $userPrizes[$i]['PRI_NAME']?> qui vous octroie <?= $userPrizes[$i]['PRI_DESCRIPTION']?> sur <?= $userPrizes[$i]['PRI_APPLYON']?></li>
			<?php } ?>
		</ul>
	</div>
<div class="deja"></div>
	<div class="button-group">
		<a class="btn btn-primary customColor button" href="/Deconnexion">Déconnexion</a>
		<a class="btn btn-primary customColor button" href="/MessageSupport">Écrire au support</a>
		<a class="btn btn-primary customColor button" href="/Calendrier">Accéder au calendrier</a>
	</div>
</div>
<?php
$content = ob_get_clean();
require('template.php');