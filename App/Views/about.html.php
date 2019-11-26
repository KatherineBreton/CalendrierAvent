<?php
$title = 'À propos';
ob_start();?>

<h2>À propos de l'opération Calendrier de l'Avent par la FNAC</h2>



<?php
$content = ob_get_clean();
require('template.php');