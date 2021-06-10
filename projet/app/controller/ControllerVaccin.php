<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin
{

    public static function vaccinReadAll()
    {
        $vaccins = ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        require($vue);
    }

    // Affiche le formulaire de creation d'un vaccin
    public static function vaccinCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau vaccin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function vaccinCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelVaccin::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));

        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require($vue);
    }

    // Modifie les doses d'un vaccin
    public static function vaccinUpdate()
    {
        $vaccins = ModelVaccin::getAll();

        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdate.php';
        require($vue);
    }

    public static function vaccinUpdated()
    {
        $vaccin_id = $_GET['vaccin'];
        $doses = $_GET['doses'];
        $results = ModelVaccin::update($vaccin_id, $doses);

        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdated.php';
        require($vue);
    }
}

?>


