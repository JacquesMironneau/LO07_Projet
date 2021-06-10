<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3>Ajouter un centre</h3>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='centreCreated'>
            <label for="label">Label : </label><br/><input type="text" name='label' id="label" size='40'
                                                           value=''><br/><br/>
            <label for="adresse">Adresse : </label><br/><input type="text" name='adresse' id="adresse" size='80'
                                                               value=''>
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>