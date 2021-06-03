<!-- ----- debut Router1 -->
<?php
require('../controller/ControllerVaccin.php');
require('../controller/Controller.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

$action = $param['action'];

unset($param['action']);

$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "vaccinReadAll" :
    case "vaccinCreate" :
    case "vaccinCreated" :
    case "vaccinUpdate" :
    case "vaccinUpdated" :
   ControllerVaccin::$action();
        break;

    // Tache par défaut
    default:
        $action = "accueil";
        Controller::$action();
}
?>
<!-- ----- Fin Router1 -->

