<?php
$title = "Mauvais jour";
ob_start();
?>

<h2>Ce n'est pas le bon jour !</h2>
<div class="container">
	<a class="btn btn-primary customColor button" class="btn btn-primary" href="/Calendrier">Revenir au calendrier</a>
</div>

<?php
$content = ob_get_clean();
require('template.php');
