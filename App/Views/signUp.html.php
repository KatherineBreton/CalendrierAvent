<?php
$title = 'Inscription';
ob_start();?>

<h2>Inscription</h2>
    <form class="form-horizontal" action="Inscription" method="post">
        <div>
            <label for="mail">Adresse mail</label>
            <input id="mail" type="email" name="mail" required>
        </div>
        <div>
            <label for="fname">Prénom</label>
            <input id="fname" type="text" name="fname" required>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <label for="passwordConfirm">Confirmation du mot de passe</label>
            <input id="passwordConfirm" type="password" name="passwordConfirm" required>
        </div>
        <div>
            <label for="acceptCG">J'ai lu et j'accepte les <a class="link" href="/ConditionsGeneralesUtilisation">conditions générales d'utilisation</a></label>
            <input type="checkbox" name="acceptCG">
        </div>
        <input class="btn btn-primary customColor" type="submit" value="S'inscrire">
        <div class="deja">
            <p class="pdeja">Déjà un compte ?</p>
            <a class="btn btn-primary customColor" href="Connexion">Se connecter</a>
        </div>
    </form>
<?php include("footer.html.php");?>
<?php
$content = ob_get_clean();
require('template.php');