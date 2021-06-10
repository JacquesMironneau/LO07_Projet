<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
<?php
include $root . '/app/view/fragment/fragmentMenu.html';
include $root . '/app/view/fragment/fragmentJumbotron.html';
?>

<?php
if ($results['code'] == 1) {
    $name = $results['result'];
    echo("<h3>Les nouveaux stocks pour le centre : '$name' ont été ajouté</h3>");
} else if ($results['code'] == 2) {
    $name = $results['result'];
    echo("<h3>Les stocks pour le centre : '$name' ont été modifié</h3>");
} else if ($results['code'] == 3) {
    echo("<h3>Aucun stock n'a été ajouté car vous n'avez pas rentré de doses</h3>");
} else {
    echo("<h3>Problème d'insertion / modification des stocks</h3>");
}

echo("</div>");

include $root . '/app/view/fragment/fragmentFooter.html';