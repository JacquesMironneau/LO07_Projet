<!-- ----- debut Model -->
<?php

class Model extends PDO
{

    private static $_instance;

    // Constructeur : héritage public obligatoire par héritage de PDO
    public function __construct()
    {
    }

    //Singleton
    public static function getInstance()
    {
        // les variables sont définies dans le fichier config.php
        include_once '../controller/config.php';

        if (DEBUG) echo("Model : getInstance : dsn = $dsn</br>");

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        if (!isset(self::$_instance)) {
            try {
                self::$_instance = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            }
        }
        return self::$_instance;
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

?>
<!-- ----- fin Model -->
