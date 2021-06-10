<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Documentation état des stocks de vaccins</h3>
    <h4>Aspect innovant</h4>
    Nous avons choisi de réaliser une <strong>utilisation originale</strong> des données de la base.
    Pour ce faire nous avons réaliser un graphique représentant le nombre de vaccins totaux disponibles par catégorie.

    <h4> Documentation technique</h4>
    Pour la réalisation, nous avons utilisé la librairie chart.js. Celle-ci nous permet de réaliser des graphiques en
    javascript facilement.
    Nous avons transférer les données php dans du js en utilisant un json_encode.
    Puis nous avons appellé les fonctions de la librairie pour obtenir un graphique à barre avec des
    couleurs personnalisées.

</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>