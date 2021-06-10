<?php
require_once 'Model.php';

class ModelPatient
{
    private $id, $nom, $prenom, $adresse;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
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
     * @return mixed|null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed|null $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed|null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed|null $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed|null
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed|null $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom, $prenom, $adresse)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from patient";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into patient value (:id, :nom, :prenom, :adresse)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse
            ]);
            return array("nom" => $nom, "prenom" => $prenom);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}