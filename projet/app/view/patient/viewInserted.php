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
if ($results) {
    $nom = $results["nom"];
    $prenom = $results["prenom"];
    echo("<h3>Le nouveau patient : $nom $prenom a été ajouté </h3>");
} else {
    echo("<h3>Problème d'insertion du patient</h3>");
}

echo("</div>");

include $root . '/app/view/fragment/fragmentFooter.html';