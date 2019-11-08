<?php
$title = "Calendrier de l'Avent";
ob_start();?>

<h2>Calendrier de l'Avent</h2>


<?php
$content = ob_get_clean();
require('template.php');