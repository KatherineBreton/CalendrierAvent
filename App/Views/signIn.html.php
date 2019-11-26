<?php
$title = 'Connexion';
ob_start();?>

<h2>Connexion</h2>
    <form action="Connexion" method="post">
        <label for="mail">Adresse mail</label>
        <input type="email" name="mail">

        <label for="password">Mot de passe</label>
        <input type="password" name="password">

        <input class="btn btn-primary customColor" type="submit" value="Se connecter">

        <div class="deja">
	        <p class="pdeja">Je n'ai pas de compte!</p>
	        <a class="btn btn-primary customColor" href="Inscription">S'inscrire</a>
        </div>
    </form>
<?php
$content = ob_get_clean();
require('template.php');