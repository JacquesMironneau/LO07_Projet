<?php
require_once '../model/ModelRendezVous.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelVaccin.php';

class ControllerRendezVous
{

    public static function situationVaccinale()
    {
        $patient_id = $_GET['id'];

        $results = ModelRendezVous::getSituationVaccinale($patient_id);

        echo("<br>");
        echo("<br>");
        include 'config.php';

        if (count($results) == 0) {
            $centres = ModelCentre::getAllWithAtLeastOneShot();
            $view = $root . '/app/view/rdv/choixCentre.php';

        } else {

            $vaccin_id = $results[0]['vaccin_id'];
            $vaccin = ModelVaccin::getOne($vaccin_id);

            if ($vaccin->getDoses() == count($results)) {
                $view = $root . '/app/view/rdv/dossierVaccination.php';
            }
            else {
                $centres = ModelCentre::getAllWithAtLeastOneShotWithVaccine($vaccin_id);
                $view = $root . '/app/view/rdv/choixCentre.php';
            }
        }
        require($view);
    }

    // Le patient a choisi un centre, on lui attribut la dose la plus disponible
    public static function priseRendezVous()
    {
        $centre_id = $_GET['centre'];
        $patient_id = $_GET['patient'];

        $results = ModelRendezVous::getSituationVaccinale($patient_id);
        if (count($results) == 0) {
            $vaccin_id = ModelRendezVous::getMostAvailableVaccinByCentre($centre_id);
            ModelRendezVous::vaccine($centre_id, $patient_id, $vaccin_id, 1);
        } else {

            $previous_vaccin_id = $results[0]['vaccin_id'];

            ModelRendezVous::vaccine($centre_id, $patient_id, $previous_vaccin_id, count($results)+1);
        }

        $results = ModelRendezVous::getSituationVaccinale($patient_id);

        include 'config.php';

        $view = $root . '/app/view/rdv/priseRendezVous.php';
        require($view);
    }
}