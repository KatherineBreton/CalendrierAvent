<?php
$title = 'Nous contacter';
ob_start();?>

<h2>Nous contacter</h2>
<form>
	<label>Votre mail</label>
	<input type="mail" name="">

	<label>Votre nom</label>
	<input type="text" name="">

	<label>Votre message</label>
	<textarea></textarea>

	<input class="btn btn-primary customColor" type="submit" value="Envoyer">
</form>
<?php include("footer.html.php");?>
<?php
$content = ob_get_clean();
require('template.php');