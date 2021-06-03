<?php
require_once '../model/ModelPatient.php';

class ControllerPatient
{

    // Liste des patients
    public static function patientReadAll()
    {
        $results = ModelPatient::getAll();
        include 'config.php';
        require($root . '/app/view/patient/viewAll.php');
    }

    public static function patientCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsert.php';
        require($vue);
    }

    public static function patientCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelPatient::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserted.php';
        require($vue);
    }


}