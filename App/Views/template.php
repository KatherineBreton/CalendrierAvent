<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="description" content="Calendrier de l'Avent"  />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=yes"  />

<!--    <link rel="stylesheet" type="text/css" href="../../public/Assets/CSS/" />-->
<!--    <link rel="apple-touch-icon" href=""  />-->
<!--    <link rel="icon" href="" />-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script>
    <script type="text/javascript" src="../Assets/JS/main.js" defer></script>

</head>
    <body>
        <?= include("header.html.php");?>
        <?= $content;?>
        <?= include("footer.html.php");?>
    </body>
</html>
