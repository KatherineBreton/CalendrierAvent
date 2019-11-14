<?php
$title = "Vous avez gagné!";
ob_start();

$prizeController = new prizeController;
$getPrize = $prizeController->getRandomPrize();
var_dump($getPrize);

$prizeController = new prizeController;
$currentDate = $prizeController->generateDate();
?>

<h2>Vous avez gagné!</h2>

<p>Félicitations!</p>
<p>Vous avez gagné un <?= $getPrize['PRI_NAME'];?> qui vous octroit <?= $getPrize['PRI_DESCRIPTION']?>
 sur le rayon <?= $getPrize['PRI_APPLYON']?> et utilisable jusqu'à
ce soir 23h59!</p>

<?php
$content = ob_get_clean();
require('template.php');