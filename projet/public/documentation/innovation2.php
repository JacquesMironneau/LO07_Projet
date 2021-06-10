<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Documentation: Comment dois-je m'habiller pour me faire vacciner ?</h3>
    <h4>Aspect innovant</h4>
    Nous avons choisi de réaliser une une page permettant d'aider l'utilisateur à choisir des habits adaptés
    pour aller se faire vacciner. En fonction de la température extérieure (à Troyes)
    nous vous conseillons différents types d'habits afin d'etre le plus à l'aise possible lors de la vaccination.


    <h4> Documentation technique</h4>
    Pour ce faire, nous avons utliser la méthode fetch pour récupérer la température de la ville de Troyes sur Open Wheather
    API. Ensuite, nous affichons la température et en fonction de celle-ci nous conseillons plusieurs vêtements.
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>