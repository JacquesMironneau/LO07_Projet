<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3> Ajout d'un vaccin</h3>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='vaccinCreated'>
            <label for="label">Label : </label><input type="text" name='label' id='label' size='75' value=''>
            <br>
            <label for="doses">Dose : </label><input type="number" name='doses' id='doses' min='1' value=''>
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>