<?php
require_once 'Model.php';

class ModelStock
{
    private $centre_id, $vaccin_id, $quantite;

    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL)
    {
        if (!is_null($centre_id) && !is_null($vaccin_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }

    /**
     * @return mixed
     */
    public function getCentreId()
    {
        return $this->centre_id;
    }

    /**
     * @param mixed $centre_id
     */
    public function setCentreId($centre_id)
    {
        $this->centre_id = $centre_id;
    }

    /**
     * @return mixed
     */
    public function getVaccinId()
    {
        return $this->vaccin_id;
    }

    /**
     * @param mixed $vaccin_id
     */
    public function setVaccinId($vaccin_id)
    {
        $this->vaccin_id = $vaccin_id;
    }

    /**
     * @return mixed|null
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed|null $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }


    public static function getAll($query)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $cols = array_keys($results[0]);
            $datas = $results;
            return array($cols, $datas);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($centre_id, $doses)
    {
        try {
            $database = Model::getInstance();
            $nb_insert = 0;
            if (!empty($doses)) {
                foreach ($doses as $vid => $qte) {
                    $query = "select * from stock where centre_id = :cid and vaccin_id = :vid";
                    $statement = $database->prepare($query);
                    $statement->execute([
                        ':cid' => $centre_id,
                        ':vid' => $vid
                    ]);
                    if (empty($statement->fetchAll(PDO::FETCH_CLASS, "ModelStock"))) {
                        $nb_insert++;
                    }
                    $query = "INSERT INTO stock (centre_id, vaccin_id, quantite) 
VALUES (:centre_id, :vaccin_id, :quantite)
ON DUPLICATE KEY UPDATE
quantite=:quantite+quantite";
                    $statement = $database->prepare($query);
                    $statement->execute([
                        'centre_id' => $centre_id,
                        'vaccin_id' => $vid,
                        'quantite' => $qte
                    ]);
                }
            } else {
                return ["code" => 3];
            }
            if ($nb_insert == 0) {
                $res = 2;
            } else {
                $res = 1;
            }
            return ["code" => $res, "result" => ModelCentre::getOne($centre_id)[0]->getLabel()];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return ["code" => -1];
        }
    }

    public static function getStockGraph()
    {
        try {
            $database = Model::getInstance();
            $query = "select label,sum(quantite) as quantite from stock join vaccin on vaccin_id = id group by label";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}