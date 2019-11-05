<?php
$title = 'Inscription';

ob_start();?>

    <h1>Inscription</h1>

<?php

$content = ob_get_clean();
require('template.php');