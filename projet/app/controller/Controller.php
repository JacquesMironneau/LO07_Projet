<?php


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
}