<?php
$title = 'Connexion';

ob_start();?>

<h2>Connexion</h2>
    <form action="../Controllers/mainController.php" method="post">
        <label for="mail">Adresse mail</label>
        <input type="email">

        <label for="password">Mot de passe</label>
        <input type="password">

        <input type="submit" value="Se connecter">
    </form>
<?php
$content = ob_get_clean();
require('template.php');