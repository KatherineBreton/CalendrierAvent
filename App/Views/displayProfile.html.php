<?php
$title = 'Profil';

ob_start();?>

<h2>Profil Utilisateur</h2>

<p>Bonjour <?=$_SESSION['fname']?></p>
<p>Votre adresse mail est <?=$_SESSION['mail']?></p>
<!--<p>Vous vous êtes inscrit le --><?//= ?><!--</p>-->

<a href="Deconnexion">Déconnexion</a>
<a href="MessageSupport">Écrire au support</a>

<?php
$content = ob_get_clean();
require('template.php');