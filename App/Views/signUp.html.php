<?php
$title = 'Inscription';
ob_start();?>

    <h2>Inscription</h2>
    <form action="Inscription" method="post">
        <label for="mail">Adresse mail</label>
        <input id="mail" type="email" name="mail">

        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password">

        <label for="passwordConfirm">Confirmation du mot de passe</label>
        <input id="passwordConfirm" type="password" name="passwordConfirm">

        <input type="submit" value="S'inscrire">
    </form>

<?php
//header('Location: ../App/Views.signIn.html.php');
$content = ob_get_clean();
require('template.php');