<?php
require_once '../model/ModelCentre.php';

class ControllerCentre
{

    // Liste des centres
    public static function centreReadAll()
    {
        $results = ModelCentre::getAll();
        include 'config.php';
        require($root . '/app/view/centre/viewAll.php');
    }

    public static function centreCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInsert.php';
        require($vue);
    }

    public static function centreCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelCentre::insert(
            htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInserted.php';
        require($vue);
    }


}