<?php
$title = "Calendrier de l'Avent";
ob_start();?>

<h2>Calendrier de l'Avent</h2>
<!--Envoyer vers le routeur pour exécuter une requête SQL pour choisir au hasard-->
    <form action="Calendrier" method="post">
        <input id="1" type="image" src="../../Assets/Images/icon.png" alt="submit">
        <input id="2" type="image" src="../../Assets/Images/icon.png" alt="submit">
        <input id="3" type="image" src="../../Assets/Images/icon.png" alt="submit">
    </form>

<?php
$content = ob_get_clean();
require('template.php');