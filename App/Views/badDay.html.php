<?php
$title = "Mauvais jour";
ob_start();
?>

<h2>Ce n'est pas le bon jour !</h2>

<?php
$content = ob_get_clean();
require('template.php');
