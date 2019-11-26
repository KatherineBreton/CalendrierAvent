<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta name="description" content="Calendrier de l'Avent"  />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../Assets/CSS/style.css"/>

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.js" defer></script> -->
        <script type="text/javascript" src="../Assets/JS/lottie.js" defer></script>
        <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous" defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script>
    </head>

    <body>
        <?= $content;?>
        <?= include("footer.html.php");?>

    </body>

</html>
