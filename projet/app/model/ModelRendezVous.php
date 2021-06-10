<?php
require_once 'Model.php';

class ModelRendezVous
{
    private $centre_id, $patient_id, $injection, $vaccin_id;

    /**
     * ModelRendezVous constructor.
     * @param $centre_id
     * @param $patient_id
     * @param $injection
     * @param $vaccin_id
     */
    public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL)
    {
        if (!is_null($patient_id)) {
            $this->centre_id = $centre_id;
            $this->patient_id = $patient_id;
            $this->injection = $injection;
            $this->vaccin_id = $vaccin_id;
        }
    }

    public static function getSituationVaccinale($id)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT patient.id, vaccin_id, vaccin.label as vaccin, centre.label as centre, centre.adresse FROM rendezvous join patient on patient.id = patient_id join vaccin on vaccin_id = vaccin.id join centre on centre_id = centre.id where patient.id = :id order by injection ASC";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMostAvailableVaccinByCentre($centre_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select vaccin_id from stock where centre_id = :id group by quantite order by quantite desc limit 1";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $centre_id]);

            $res = $statement->fetch(PDO::FETCH_ASSOC);
            return $res['vaccin_id'];

        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function vaccine($centre_id, $patient_id, $vaccin_id, $injection)
    {
        try {
            // Update the stock
            $database = Model::getInstance();

            $update = "update  stock set quantite = quantite - 1 where centre_id = :cid and vaccin_id = :vid";
            $statement = $database->prepare($update);
            $statement->execute([
                'cid' => $centre_id,
                'vid' => $vaccin_id,
            ]);


            // Update the patient folder
            $insert_rdv = "insert into rendezvous values(:cid, :pid, :injection, :vid)";
            $statement = $database->prepare($insert_rdv);
            $statement->execute([
                'cid' => $centre_id,
                'pid' => $patient_id,
                'injection' => $injection,
                'vid' => $vaccin_id,
            ]);

        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    /**
     * @return mixed|null
     */
    public
    function getCentreId()
    {
        return $this->centre_id;
    }

    /**
     * @param mixed|null $centre_id
     */
    public
    function setCentreId($centre_id)
    {
        $this->centre_id = $centre_id;
    }

    /**
     * @return mixed
     */
    public
    function getPatientId()
    {
        return $this->patient_id;
    }

    /**
     * @param mixed $patient_id
     */
    public
    function setPatientId($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    /**
     * @return mixed|null
     */
    public
    function getInjection()
    {
        return $this->injection;
    }

    /**
     * @param mixed|null $injection
     */
    public
    function setInjection($injection)
    {
        $this->injection = $injection;
    }

    /**
     * @return mixed|null
     */
    public
    function getVaccinId()
    {
        return $this->vaccin_id;
    }

    /**
     * @param mixed|null $vaccin_id
     */
    public
    function setVaccinId($vaccin_id)
    {
        $this->vaccin_id = $vaccin_id;
    }


}