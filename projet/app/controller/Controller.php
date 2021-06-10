<?php

require_once "../model/Model.php";

class Controller
{
    // --- page d'acceuil
    public static function accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo("ControllerVin : caveAccueil : vue = $vue");
        require($vue);
    }

    public static function graphStockVaccin()
    {

        $results = Model::getStockGraph();

        include 'config.php';
        $vue = $root . '/app/view/vaccin/graphStockVaccin.php';
        require($vue);
    }
}