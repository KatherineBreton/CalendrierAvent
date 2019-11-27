<?php
$title = "Bienvenue sur le Calendrier de l'Avent Fnac";
ob_start();
?>

<div id="lottie"></div>
    <div class="accroche">
        <div>
            <h1>Bienvenue sur le Calendrier de l'Avent Fnac</h1>
        </div>
        <div class="button-block">
            <a href="/Connexion">Viens vite !</a>
        </div>
    </div>
    <?php include("footer.html.php");?>

<script type="text/javascript" src="../Assets/JS/lottie.js"></script>
    <script>
        let animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'), // Required
            path: "/Flocon.json", // Required
            renderer: 'svg', // Required
            loop: true, // Optional
            autoplay: true, // Optional
            name: "Hello World", // Name for future reference. Optional.
            })
    </script>
<?php
$content = ob_get_clean();
require('template.php');