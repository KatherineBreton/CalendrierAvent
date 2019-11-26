<?php
$title = "Calendrier de l'Avent";
ob_start();

$prizeController = new prizeController;
$currentDate = $prizeController->generateDate();
// $verify = Vérifie si le joueur a déjà joué aujourd'hui
$verify = $prizeController->verifyDay();
var_dump($verify);

//Tableau associatif avec les dates en index, et vide au niveau des prix
$dates = [];
for($i = 1; $i <= 25; $i++) {
    $day = str_pad($i, 2, '0', STR_PAD_LEFT);
    $dates["2019-12-$day"] = [];
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
                <div class="yellow-block calendar-item-<?= $date; ?>">
                    <div class="white-box">
                        <a name="<?= $date; ?>"<?= $date == $currentDate && !$verify ? $href="/Gagne?date=" . $currentDate : $href="/mauvaisJour";?> href="<?= $href;?>">
                            <p><?php
                            $dayToShow = substr($date, 8);
                            echo $dayToShow;
                            ?></p>
                            <!-- <img src="../../Assets/Images/icon.png" alt=""> -->
        <!--                    --><?php //if(!empty($price)):?>
        <!--                        --><?php //print_r($price) ?>
        <!--                    --><?php //endif;?>
                        </a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
      
</div> 

    <script>
        var animation = bodymovin.loadAnimation({
        container: document.getElementById('lottie'), // Required
        path: '../../public/Assets/CSS/Flocon.json', // Required
        renderer: 'svg', // Required
        loop: true, // Optional
        autoplay: true, // Optional
        name: "Hello World", // Name for future reference. Optional.
        })
    </script>

<?php
$content = ob_get_clean();
require('template.php');