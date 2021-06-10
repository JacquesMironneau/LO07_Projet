<?php
require_once 'Model.php';

class ModelVaccin
{
    private $id, $label, $doses;

    /**
     * ModelVaccin constructor.
     * @param $id
     * @param $label
     * @param $dose
     */
    public function __construct($id = NULL, $label = NULL, $doses = NULL)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->doses = $doses;
        }
    }

    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from vaccin";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($vaccin_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from vaccin where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $vaccin_id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");

            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label, $doses)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from vaccin";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into vaccin value (:id, :label, :doses)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'doses' => $doses,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update($id, $doses)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "update vaccin set doses = :doses where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'doses' => $doses,
            ]);
            return 0;

        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getDoses()
    {
        return $this->doses;
    }

    /**
     * @param mixed $dose
     */
    public function setDose($dose)
    {
        $this->doses = $dose;
    }


}