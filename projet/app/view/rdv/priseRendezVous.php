<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if (count($results) == 1) {
        printf("Vous allez recevoir une première dose du vaccin %s à %s (Adresse du centre : %s)", $results[0]['vaccin'], $results[0]['centre'], $results[0]['adresse']);
    } elseif (count($results) == 2) {
        printf("Vous allez recevoir une seconde dose du vaccin %s à %s (Adresse du centre : %s)", $results[1]['vaccin'], $results[1]['centre'], $results[1]['adresse']);
    } else {
        printf("Vous allez recevoir votre dose n°%d du vaccin %s à %s (Adresse du centre : %s)", count($results), $results[1]['vaccin'], $results[1]['centre'], $results[1]['adresse']);

    }
    ?>


</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
