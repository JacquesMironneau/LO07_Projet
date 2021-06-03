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
            <input type="hidden" name='action' value='centreCreated'>
            <label for="id">Label : </label><br /><input type="text" name='label' size='40' value='Pastaga'><br /><br />
            <label for="id">Adresse : </label><br /><input type="text" name='adresse' size='80' value='50, rue de la Vierge Margie, 51000 Pastis'>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>