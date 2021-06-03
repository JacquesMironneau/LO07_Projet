<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='patientCreated'>
            <label for="id">Nom : </label><br /><input type="text" name='nom' size='40' value='Pastis'><br /><br />
            <label for="id">Prénom : </label><br /><input type="text" name='prenom' size='40' value='51'><br /><br />
            <label for="id">Adresse : </label><br /><input type="text" name='adresse' size='80' value='50, rue de la Vierge Marie, 51000 Pastis'>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>