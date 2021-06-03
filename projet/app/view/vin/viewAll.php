<!-- ----- début viewAll -->
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
            <th scope="col">id</th>
            <th scope="col">cru</th>
            <th scope="col">année</th>
            <th scope="col">degré</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        foreach ($results as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%.2f</td></tr>", $element->getId(),
                $element->getCru(), $element->getAnnee(), $element->getDegre());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAll -->
  
  
  