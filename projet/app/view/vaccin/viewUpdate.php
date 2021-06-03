<!-- ----- début viewInsert -->

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
            <input type="hidden" name='action' value='vaccinUpdated'>

            <label for="vin">Sélectionnez un vin : </label>
            <select class="form-control" id='vaccin' name='vaccin' style="width: 300px">
                <?php
                foreach ($vaccins as $vaccin) {
                    printf ("<option name='vaccin' value='%s'>%s: %s; doses: %s</option>", $vaccin->getId(), $vaccin->getId(), $vaccin->getLabel(), $vaccin->getDoses());
                }
                ?>
            </select>
            <br>
            <label for="doses">Dose : </label><input type="number" name='doses' id='doses' value=''>
        </div>
        <button class="btn btn-primary" type="submit">Modifier la dose</button>
    </form>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



