<?php
$title = 'Mentions Légales';
ob_start();?>

<h2>Mentions légales</h2>



<?php
$content = ob_get_clean();
require('template.php');