<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <?php
            foreach ($results["0"] as $keys=>$value) {
                $value = str_replace("_", " ", $value);
                echo ("<th scope=\"col\">$value</th>");
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        foreach ($results["1"] as $element) {
            echo "<tr>";
            foreach ($element as $value) {
                echo("<td>$value</td>");
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
  
  
  