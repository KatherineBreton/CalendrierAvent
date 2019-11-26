<?php
$title = "Calendrier de l'Avent";
ob_start();

$prizeController = new prizeController;
$currentDate = $prizeController->generateDate();
// $verify = Vérifie si le joueur a déjà joué aujourd'hui
// $verify = $prizeController->verifyDay();
// var_dump($verify);

//Tableau associatif avec les dates en index, et vide au niveau des prix
$datesInOrder = [];
for($i = 1; $i <= 25; $i++) {
    $day = str_pad($i, 2, '0', STR_PAD_LEFT);
    $datesInOrder["2019-12-$day"] = [];
}

// On mélange les dates
$dates = [];
$keys = array_keys($datesInOrder);
shuffle($keys);

foreach ($keys as $key)
{
    $dates[$key] = $datesInOrder[$key];
}

?>
<div id="lottie"></div> 
 <div class="calendar-box">
    <div class="slogan-box">
        <div><img src="../../Assets/Images/slogan.png" alt=""></div>
            <h2>Bienvenue sur votre calendrier de l'avent Fnac !</h2>
            <p> Gagnez des cadeaux et des réductions à foison !</p>
        </div>

        <div class="giant-box">
            <?php foreach($dates as $date => $price):?>
    <!--        On génère une div à chaque itération avec la date en class pour les différencier-->
                <div <?= $date == $currentDate ? $class = "yellow-block taken" : $class = "yellow-block"; ?> class= "<?= $class;?> calendar-item-<?= $date; ?>">
                    <div <?= $date == $currentDate ? $class = "white-box clicked" : $class = "white-box"; ?> class= "<?= $class;?> calendar-item-<?= $date; ?>">
                        <a name="<?= $date; ?>"<?= $date == $currentDate && !$verify ? $href="/Gagne?date=" . $currentDate : $href="/mauvaisJour";?> href="<?= $href;?>">
                            <p><?php
                            $daysToShow = substr($date, 8);
                            echo $daysToShow;
                            ?></p>
        <!--                    --><?php //if(!empty($price)):?>
        <!--                        --><?php //print_r($price) ?>
        <!--                    --><?php //endif;?>
                        </a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
      
</div>
<a class="btn btn-primary customColor button-calendar" href="/Profil">Revenir au profil</a>

<script type="text/javascript" src="../Assets/JS/lottie.js"></script>
    <script>
        let animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'), // Required
            path: "/Flocon.json", // Required
            renderer: 'svg', // Required
            loop: true, // Optional
            autoplay: true, // Optional
            name: "Hello World", // Name for future reference. Optional.
            })
    </script>

<?php
$content = ob_get_clean();
require('template.php');