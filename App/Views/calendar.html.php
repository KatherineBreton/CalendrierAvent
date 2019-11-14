<?php
$title = "Calendrier de l'Avent";
ob_start();

$prizeController = new prizeController;
$currentDate = $prizeController->generateDate();

//Tableau associatif avec les dates en index, et vide au niveau des prix
$dates = [];
for($i = 1; $i <= 25; $i++) {
    $day = str_pad($i, 2, '0', STR_PAD_LEFT);
    $dates["2019-12-$day"] = [];
}

//$wins = [
//    [
//        'pri_dateSelected' => '2019-12-03'
//    ]
//];

//Fonction qui génère le prix lié à l'utilisateur
//$wins = getRandomPrize();

//On remplit le tableau au niveau des prix par jours selon l'utilisateur connecté pour avoir un historique
//foreach($wins as $win) {
//    $dates[$win['pri_dateSelected']] = $win;
//}
//?>

    <h2>Calendrier de l'Avent</h2>
    <div id="avent-calendar">
        <?php foreach($dates as $date => $price):
//            var_dump($price);
        ?>
<!--        On génère une div à chaque itération avec la date en class pour les différencier-->
            <div class="calendar-item calendar-item-<?= $date; ?>">
                <a name="<?= $date; ?>"<?= $date == $currentDate ? $href="/Gagne" : $href="/mauvaisJour";?> href="<?= $href;?>">
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