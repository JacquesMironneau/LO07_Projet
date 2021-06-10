
<!-- ----- début viewId -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    // $results contient un tableau avec la liste des clés.
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action'  value='situationVaccinale'>
            <label for="id">id : </label>
            <select class="form-control" id='id' name='id' style="width: 300px">
                <?php
                foreach ($results as $id) {
                    printf("<option name='patient' value='%s'>%d : %s : %s</option>", $id->getId(), $id->getId(), $id->getNom(), $id->getPrenom());
                }
                ?>
            </select>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewId -->