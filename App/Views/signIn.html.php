<?php
$title = 'Connexion';

ob_start();?>

<h1>Connexion</h1>

<?php
$content = ob_get_clean();
require('template.php');