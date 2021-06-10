<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3>Attribuer des vaccins pour un centre</h3>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='stockCreated'>
            <label for="stock_centre">Label : </label> <select class="form-control" id='stock_centre'
                                                               name="stock_centre"
                                                               style="width: 300px">
                <?php
                foreach ($results['centre'] as $centre) {
                    $label = $centre->getLabel();
                    $id = $centre->getId();
                    echo("<option name='stock_centre' value='$id'>$id : $label</option>");
                }
                ?>
            </select><br/>
            <?php
            foreach ($results['vaccin'] as $vaccin) {
                $label = $vaccin->getLabel();
                $id = $vaccin->getId();
                echo("<label for='$id'>$label</label><br /><input type='number' min='1' name='$id'><br /><br />");
            }
            ?>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>