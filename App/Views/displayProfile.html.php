<?php
$title = 'Profil';
ob_start();?>

<h2>Profil Utilisateur</h2>

<div class="container">
	<p class="welcome">Bonjour <?=$_SESSION['fname']?></p>
	<p>Votre adresse mail est <?=$_SESSION['mail']?></p>
	<p>Vous vous êtes inscrit le <?= $_SESSION['date']?></p>

	<div class="button-group">
		<a class="btn btn-primary customColor button" href="/Deconnexion">Déconnexion</a>
		<a class="btn btn-primary customColor button" href="/MessageSupport">Écrire au support</a>
		<a class="btn btn-primary customColor button" href="/Calendrier">Accéder au calendrier</a>
	</div>
</div>
<?php
$content = ob_get_clean();
require('template.php');