<?php
$title = "Liste des prix";
ob_start();?>

<h2>Liste des prix</h2>

<?php
$content = ob_get_clean();
require('template.php');