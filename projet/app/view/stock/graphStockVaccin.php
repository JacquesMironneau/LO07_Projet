<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Nombre total de vaccins disponible</h3>
    <div>
        <canvas width="80" height="25" id="myChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let domData = <?php echo json_encode($results, JSON_HEX_TAG); ?>;
    domData = domData.filter(x => x.quantite > 0)
    const labels = domData.map(x => x.label)
    const data = {
        labels: labels,
        datasets: [{
            label: 'Nombre de vaccin(s) disponible(s)',
            data: domData.map(x => x.quantite),
            backgroundColor: [
                'rgb(99,190,252)',
                'rgb(55,124,205)',
                'rgb(12,114,232)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    let myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

<?php
include $root . '/app/view/fragment/fragmentFooter.html'; ?>


