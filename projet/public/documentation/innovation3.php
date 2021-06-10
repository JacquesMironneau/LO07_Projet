<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Où puis-je me faire vacciner ?</h3>
    <h4>Aspect innovant</h4>
    Nous avons choisi de réaliser une <strong>utilisation originale</strong> des données de la base.
    Pour ce faire, nous avons implémenter une carte qui montre avec des pins où se situe le centre de vaccination
    séléctionné par l'utilisateur, ceci lui permettra d'évaluer si le centre est plus ou moins proche de chez lui.

    <h4> Documentation technique</h4>
    Quant aux solutions techniques utilisées pour ceci, nous avons utilisé jQuery pour envoyer une requête ajax en XHR
    à une api du gouvernement, celle-ci traduit une adresse postale en coordonnée du type latitude, longitude. Ce qui
    permet en utilisant Leaflet (librairie JS) de placer des points où se trouve les centres. La carte vient de
    Open Street Map.
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>