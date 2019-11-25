<?php
$title = "Calendrier de l'Avent";
ob_start();

$prizeController = new prizeController;
$currentDate = $prizeController->generateDate();
// $verify = Vérifie si le joueur a déjà joué aujourd'hui
$verify = $prizeController->verifyDay();
// var_dump($verify);

//Tableau associatif avec les dates en index, et vide au niveau des prix
$dates = [];
for($i = 1; $i <= 25; $i++) {
    $day = str_pad($i, 2, '0', STR_PAD_LEFT);
    $dates["2019-12-$day"] = [];
}

?>

    <h2>Calendrier de l'Avent</h2>
    <div id="avent-calendar">
        <?php foreach($dates as $date => $price):
        ?>
<!--        On génère une div à chaque itération avec la date en class pour les différencier-->
            <div class="calendar-item calendar-item-<?= $date; ?>">
                <a name="<?= $date; ?>"<?= $date == $currentDate && !$verify ? $href="/Gagne?date=" . $currentDate : $href="/mauvaisJour";?> href="<?= $href;?>">
                    <img src="../../Assets/Images/icon.png" alt="">
<!--                    --><?php //if(!empty($price)):?>
<!--                        --><?php //print_r($price) ?>
<!--                    --><?php //endif;?>
                </a>
            </div>
        <?php endforeach;?>
    </div>

<?php
$content = ob_get_clean();
require('template.php');