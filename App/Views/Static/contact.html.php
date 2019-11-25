<?php
$title = 'Nous contacter';
ob_start();?>

<?php
$content = ob_get_clean();
require('template.php');