<?php

require_once('../config.php');

class Model
{   //* Début de la Classe

    private $bd;

    private static $instance = null;

    /*
         * Constructeur créant l'objet PDO et l'affectant à $bd
         */
    private function __construct()
    {  //* Fonction qui sert à faire le lien avec la BDD

        $this->bd = new PDO(DSN, LOGIN, MDP);
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
    
    public function get_all_user() 
    {
        $query = ("SELECT * FROM user;");
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    // ^ Requete fonctionnelle mais mais renvoie toute les données pour chaque thèmes, et niveau 
    // * Vue avec Lionel en attente
    // $query = "SELECT 
    // distinct user.nom, user.pseudo, user.email, theme.nom_theme, question.niveau, question.tps_question, repondre.scores
    //  FROM user join theme 
    //  join question 
    //  join repondre";
    //! Deuxieme version avec inner join 
    // $r = $this->bd->prepare("SELECT  u.nom, u.pseudo, u.email, t.nom_theme, q.niveau, q.tps_question, r.scores
    // FROM user u
    // INNER JOIN repondre r ON u.id = r.user_id
    // INNER JOIN theme t ON r.theme_id = t.id
    // INNER JOIN question q ON r.theme_id = q.theme_id");
    // $r->execute();
    // return $r->fetchAll(PDO::FETCH_OBJ);
    public function get_all_user_names()
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

        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);        
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

    //! ////////////// fin code Mathieu //////////////////////////////


        public function get_all_user_name_affiche()
    {
        $name = $_POST["all_name_user"];

        $query = "SELECT * FROM user WHERE nom = :name";
        $r = $this->bd->prepare($query);
        $r->bindParam(':name', $name);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_user_pseudo_affiche()
    {
        $pseudo = $_POST["all_user_pseudo"];
        $query = "SELECT * FROM user WHERE pseudo = :pseudo";
        $r = $this->bd->prepare($query);
        $r->bindParam(':pseudo', $pseudo);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function get_all_user_mail_affiche()
    {
        $email = $_POST["all_mail_user"];

        $query = "SELECT * FROM user WHERE email = :email";
        $r = $this->bd->prepare($query);
        $r->bindParam(":email", $email);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_question_reponse_recherche()
    {
        $r = $this->bd->prepare("SELECT * FROM question q 
            INNER JOIN reponse r WHERE q.id = r.question_id");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    
    public function get_all_question_reponse_recherche_theme()
    {
        $theme = $_POST["all_question_reponse_theme"];

        $r = $this->bd->prepare("SELECT * FROM question q
        INNER JOIN reponse r ON q.id = r.question_id
        INNER JOIN theme t ON t.id = q.theme_id
        WHERE nom_theme = :theme");
        $r->bindParam(":theme", $theme);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
 

    
    
    
    public function get_all_question_reponse_difficulte()
    {
        $niveau = $_POST["all_question_reponse_difficulte"];
        
        $r = $this->bd->prepare("SELECT * FROM question q 
        INNER JOIN reponse r ON q.id = r.question_id
        WHERE niveau = :niveau;");
        $r->bindParam(":niveau", $niveau);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function get_all_question_reponse_time()
    {
        $temps = $_POST["all_question_reponse_time"];
        
        $r = $this->bd->prepare("SELECT * FROM question q 
        INNER JOIN reponse r ON q.id = r.question_id
        WHERE tps_question = :temps;");
        $r->bindParam(":temps", $temps);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    public function get_all_result()
    {
        $r = $this->bd->prepare("SELECT * FROM repondre r
        INNER JOIN user u ON u.id = r.user_id 
        INNER JOIN theme t ON t.id = r.theme_id");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
   
    public function get_all_result_score()
    {
        $score = $_POST["all_score_resultat"];
        $r = $this->bd->prepare("SELECT * FROM repondre r
        INNER JOIN user u ON u.id = r.user_id 
        INNER JOIN theme t ON t.id = r.theme_id 
        WHERE scores = :scores");
        $r->bindParam(":scores", $score);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function get_all_score_nom()
    {
        $nom_score = $_POST["all_user_resultat_nom"];
        $r = $this->bd->prepare("SELECT * FROM repondre r
        INNER JOIN user u ON u.id = r.user_id 
        INNER JOIN theme t ON t.id = r.theme_id 
        WHERE nom = :nom");
        $r->bindParam(":nom", $nom_score);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function get_all_score_mail()
    {
        $mail_score = $_POST["all_mail_user"];
        $r = $this->bd->prepare("SELECT * FROM repondre r
        INNER JOIN user u ON u.id = r.user_id 
        INNER JOIN theme t ON t.id = r.theme_id 
        WHERE email = :email");
        $r->bindParam(":email", $mail_score);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    // public function get_all_user_name()
    // {
    //     $r = $this->bd->prepare("SELECT * FROM user where ");
    //     $r->execute();
    //     return $r->fetchAll(PDO::FETCH_OBJ);
    // }


    // ! UPDATE
    public function get_update_score($id)
    {
        $r = $this->bd->prepare("SELECT * FROM user u
        INNER JOIN repondre r ON u.id = r.user_id WHERE u.id = :id");
        $r->bindParam(':id', $id);
        $r->execute();

        return $r->fetch();
    }

    public function get_update_score_bdd()
    {
        // Récupérer les données du formulaire
        $id = $this->valid_input($_POST['hidden']);
        $nom = $this->valid_input($_POST['name']);
        $prenom = $this->valid_input($_POST['lastname']);
        $mail = $this->valid_input($_POST['mail']);
        $score = $this->valid_input($_POST['score']);
        $date = $this->valid_input($_POST['date']);
        $niveau = $this->valid_input($_POST['niveau']);
        $temps = $this->valid_input($_POST['time']);

        $r = $this->bd->prepare("UPDATE repondre r
        SET nom = :nom, prenom = :prenom, email = :mail, scores = :scores, date = :date, niveau = :niveau, temps = :temps
        WHERE user_id = :id;");
        $r->bindParam(':nom', $nom);
        $r->bindParam(':prenom', $prenom);
        $r->bindParam(':mail', $mail);
        $r->bindParam(':scores', $score);
        $r->bindParam(':id', $id);
        $r->bindParam(':date', $date);
        $r->bindParam(':niveau', $niveau);
        $r->bindParam(':temps', $temps);
        $r->execute();
    }

    public function get_delete_score($id)
    {
        $r = $this->bd->prepare("DELETE FROM repondre WHERE id = :id");
        $r->bindParam(':id', $id);
        $r->execute();
    }

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
