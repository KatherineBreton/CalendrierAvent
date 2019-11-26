<?php
$title = 'Profil';
ob_start();?>

<h2>Profil Utilisateur</h2>

<p>Bonjour <?=$_SESSION['fname']?></p>
<p>Votre adresse mail est <?=$_SESSION['mail']?></p>
<p>Vous vous êtes inscrit le <?= $_SESSION['date']?></p>

<a class="btn btn-primary" href="/Deconnexion">Déconnexion</a>
<a class="btn btn-primary" href="/MessageSupport">Écrire au support</a>
<a class="btn btn-primary" href="/Calendrier">Accéder au calendrier</a>

<?php
$content = ob_get_clean();
require('template.php');