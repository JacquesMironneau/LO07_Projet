<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3>Ajouter un patient</h3>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='patientCreated'>
            <label for="id">Nom : </label><br/><input type="text" name='nom' size='40' value=''><br/><br/>
            <label for="id">Prénom : </label><br/><input type="text" name='prenom' size='40' value=''><br/><br/>
            <label for="id">Adresse : </label><br/><input type="text" name='adresse' size='80'
                                                          value=''>
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>