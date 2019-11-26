<?php
$title = "Vous avez gagné!";
ob_start();

$prizeController = new prizeController;
$getPrize = $prizeController->getRandomPrize();
//var_dump($getPrize);
?>

<h2>Vous avez gagné!</h2>

<div class="container">
	<p>Félicitations <?= $_SESSION['fname']?>!</p>
	<p>Vous avez gagné un <?= $getPrize['PRI_NAME'];?> qui vous octroie <?= $getPrize['PRI_DESCRIPTION']?>
	 sur le rayon <?= $getPrize['PRI_APPLYON']?> et utilisable jusqu'à
	ce soir 23h59!</p>

	<a class="btn btn-primary customColor button" href="/Profil">Revenir au profil</a>
	<a class="btn btn-primary customColor button" href="/Calendrier">Revenir au calendrier</a>
</div>

<?php
$content = ob_get_clean();
require('template.php');