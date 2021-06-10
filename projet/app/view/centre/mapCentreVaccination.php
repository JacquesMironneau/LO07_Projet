<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3 id="emplacement">Emplacement d'un centre de vaccination sur une carte</h3>
    <label for="centre">Sélectionnez un centre : </label>
    <select class="form-control" id='centre' name='centre' style="width: 400px" onselect="initMap()"
            onchange="updateMap()">
        <?php
        foreach ($results as $centre) {
            printf("<option name='centre' value='%s' data-adresse='%s'>%s: %s: %s</option>", $centre->getId(),
                $centre->getAdresse(), $centre->getId(), $centre->getLabel(), $centre->getAdresse());
        }
        ?>
    </select>
    <br/>
    <div id="osm-map"></div>
</div>
<script>
    var element = document.getElementById('osm-map');

    // Height has to be set. You can do this in CSS too.
    element.style = 'height:600px;';
    var map = L.map(element);


    // Create Leaflet map on map element.

    // Add OSM tile layer to the Leaflet map.
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    once = false;

    function initMap() {
        let centre = document.getElementById("centre").children;

        if (centre.length !== 0) {
            if (centre[0].selected) {
                adresse = centre[0].dataset.adresse;
                requestMap(adresse);
            }
        }

    }

    function updateMap() {
        let centre = document.getElementById("centre").children;

        if (centre.length !== 0) {
            for (let i = 0; i < centre.length; i++) {
                if (centre[i].selected) {
                    adresse = centre[i].dataset.adresse;
                    requestMap(adresse);
                }
            }

        }

    }

    function requestMap(adresse) {
        $.ajax({
            url: 'https://api-adresse.data.gouv.fr/search/?q=' + adresse,
            success: function (data) {
                // Target's GPS coordinates.
                var target = L.latLng(data.features[0].geometry.coordinates[1], data.features[0].geometry.coordinates[0]);

                // Set map's center to target with zoom 14.
                map.setView(target, 14);

                // Place a marker on the same location.
                L.marker(target).addTo(map);
            }
        });
    }

    window.addEventListener("DOMContentLoaded", initMap);
</script>

<?php
include $root . '/app/view/fragment/fragmentFooter.html'; ?>