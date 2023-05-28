<?php

class Model
{   //* Début de la Classe

    private $bd;

    private static $instance = null;

    /*
         * Constructeur créant l'objet PDO et l'affectant à $bd
         */
    private function __construct()
    {  //* Fonction qui sert à faire le lien avec la BDD

        $dsn = "mysql:host=localhost;dbname=qcm";   //* Coordonnées de la BDD
        $login = "root";   //* Identifiant d'accès à la BDD
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

    public function get_all_user_name()
    {
        $query = "SELECT nom FROM user";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_user_pseudo()
    {
        $query = "SELECT pseudo FROM user";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_user_mail()
    {
        $query = "SELECT email FROM user";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }



    public function get_all_theme()
    {
        $query = "SELECT  nom_theme FROM theme";


        // $query = "SELECT 
        // distinct user.nom, user.pseudo, user.email, theme.nom_theme, question.niveau, question.tps_question, repondre.scores
        //  FROM user join theme 
        //  join question 
        //  join repondre";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);

        //! Deuxieme version avec inner join 
        // $r = $this->bd->prepare("SELECT  u.nom, u.pseudo, u.email, t.nom_theme, q.niveau, q.tps_question, r.scores
        // FROM user u
        // INNER JOIN repondre r ON u.id = r.user_id
        // INNER JOIN theme t ON r.theme_id = t.id
        // INNER JOIN question q ON r.theme_id = q.theme_id");
        // $r->execute();
        // return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_niveau()
    {
        $query = "SELECT DISTINCT niveau FROM question";


        // $query = "SELECT 
        // distinct user.nom, user.pseudo, user.email, theme.nom_theme, question.niveau, question.tps_question, repondre.scores
        //  FROM user join theme 
        //  join question 
        //  join repondre";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    ////////////////////// code en cours Mathieu ///////////////////////////

    public function get_all_temps()
    {
        $query = "SELECT DISTINCT tps_question FROM question";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_score()
    {
        $query = "SELECT scores FROM repondre";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_noms()
    {
        $query = "SELECT nom FROM user";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_mail()
    {
        $query = "SELECT email FROM user";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    ///////////////// fin code Mathieu //////////////////////////////

    public function get_all_user()
    {
        $r = $this->bd->prepare("SELECT * FROM user");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_question_reponse()
    {
        $r = $this->bd->prepare("SELECT * FROM question q 
            INNER JOIN reponse r WHERE q.id = r.question_id");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_result()
    {
        $r = $this->bd->prepare("SELECT * FROM repondre");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    // public function get_all_user_name()
    // {
    //     $r = $this->bd->prepare("SELECT * FROM user where ");
    //     $r->execute();
    //     return $r->fetchAll(PDO::FETCH_OBJ);
    // }

    public function get_random_question()
    {
        $id = $_GET['id'];
        $niveau = $_GET['niveau'];
        $r = $this->bd->prepare("SELECT DISTINCT q.id AS question_id, q.question AS question, r.id AS reponse_id, r.reponse, r.correct AS correct
        FROM (
            SELECT id, question
            FROM question WHERE theme_id = '$id' AND question.niveau = '$niveau'
            ORDER BY RAND()
            LIMIT 20
        ) q
        JOIN reponse r ON q.id = r.question_id
        LIMIT 4");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
}
