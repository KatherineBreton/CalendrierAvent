<?php
$title = 'Connexion';

ob_start();?>

<h2>Connexion</h2>
    <label for="mail">Adresse mail</label>
    <input type="email">

    <label for="password">Mot de passe</label>
    <input type="password">

    <input type="submit" value="Se connecter">

<?php
$content = ob_get_clean();
require('template.php');