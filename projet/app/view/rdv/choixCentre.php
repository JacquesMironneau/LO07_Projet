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
    if (!count($centres)) {
        echo("<h2>Ce vaccin n'est disponible dans aucun centre</h2>");
    } else {

    ?>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='priseRendezVous'>
            <input type="hidden" name='patient' id='patient' value="<?php echo $patient_id ?>">

            <label for="centre">Sélectionnez un centre : </label>
            <select class="form-control" id='centre' name='centre' style="width: 400px">
                <?php
                foreach ($centres as $centre) {
                    printf("<option name='centre' value='%s'>%s: %s: %s</option>", $centre->getId(), $centre->getId(), $centre->getLabel(), $centre->getAdresse());
                }
                ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php
}
include $root . '/app/view/fragment/fragmentFooter.html'; ?>
