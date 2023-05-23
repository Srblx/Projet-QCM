<?php

class Model
{ //* Début de la Classe

    private $bd;

    private static $instance = null;

    /*
     * Constructeur créant l'objet PDO et l'affectant à $bd
     */
    private function __construct()
    { //* Fonction qui sert à faire le lien avec la BDD

        $dsn = "mysql:host=localhost;dbname=qcm"; //* Coordonnées de la BDD
        $login = "root"; //* Identifiant d'accès à la BDD
        $mdp = ""; //* Mot de passe d'accès à la BDD
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->query("SET NAMES 'utf8'");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    //* get_model()

    public static function get_model()
    {
        //* Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller (équivalent de $connex)
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_random_question()
    {

        // Récupération du nombre de questions déjà répondues
        // $r = $this->bd->prepare("SELECT COUNT(*) AS answered FROM repondre");
        // $r->execute();
        // $question = $r->fetch(PDO::FETCH_ASSOC);
        $r = $this->bd->prepare("SELECT q.id AS question_id, q.description AS question, r.id AS reponse_id, r.description, r.Correct AS reponse
        FROM (
            SELECT id, description
            FROM question
            ORDER BY RAND()
            LIMIT 20
        ) q
        JOIN reponse r ON q.id = r.question_id
        LIMIT 4");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);

    }

}