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
            <input type="hidden" name='action' value='vinCreated'>
            <label for="id">cru : </label><input type="text" name='cru' size='75' value='Champagne de déconfinement'>
            <label for="id">annee : </label><input type="number" name='annee' value='2021'>
            <label for="id">degre : </label><input type="number" step='any' name='degre' value='17.24'>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



