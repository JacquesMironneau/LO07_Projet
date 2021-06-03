<!-- ----- début viewInserted -->
<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results != -1) {
        echo("<h3>Le vin n°$results a été supprimé </h3>");
    } else {
        echo("<h3>Vous ne pouvez pas supprimer un vin qui se trouve dans la table récolte</h3>");
    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->


