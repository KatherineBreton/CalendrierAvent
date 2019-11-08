<?php
$title = "Écrire au support";

ob_start();?>
<h2>Écrire au support</h2>
    <form action="MessageSupport" method="post">
        <label for="title">Objet</label>
        <input type="text" name="title">

        <label for="message">Message :</label>
        <textarea name="message"></textarea>

        <input type="submit" value="Envoyer le message">
        <a href="Profil">Afficher mon profil</a>
    </form>

<?php
$content = ob_get_clean();
require('template.php');