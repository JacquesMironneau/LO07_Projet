<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <ul>
        <li>Ne pas utiliser des printf car c'est chiant à modifier quand on fait du copier coller !</li>
        <li>Utiliser un routeur du type Slim, micro-framework de Laravel :)</li>
    </ul>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAll -->


