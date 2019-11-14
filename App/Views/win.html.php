<?php
$title = "Vous avez gagné!";
ob_start();
?>

<h2>Vous avez gagné!</h2>



<?php
$content = ob_get_clean();
require('template.php');