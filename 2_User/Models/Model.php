<?php

require_once("../config.php");

class Model
{ //* Début de la Classe

    private $bd;

    private static $instance = null;

    /*
     * Constructeur créant l'objet PDO et l'affectant à $bd
     */
    private function __construct()
    { //* Fonction qui sert à faire le lien avec la BDD


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

    public function get_random_question()
    {
        $id = $_GET['id'];
        $niveau = $_GET['niveau'];
        $r = $this->bd->prepare("
            SELECT id
            FROM question WHERE theme_id = :id AND question.niveau = :niveau
            ORDER BY RAND()
            LIMIT 20
        ");
        $r->bindParam(':id', $id, PDO::PARAM_INT);
        $r->bindParam(':niveau', $niveau, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_une_question($id_question)
    {
        $r = $this->bd->prepare("SELECT * FROM question WHERE id = :id_question");
        $r->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }


    public function get_les_responses($id_question)
    {
        $r = $this->bd->prepare("SELECT reponse, question_id, correct FROM reponse WHERE question_id = :id_question");
        $r->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_insert_repondre($scores, $temps, $niveau, $user_id, $theme_id)
    {
        $r = $this->bd->prepare("INSERT INTO repondre (scores, temps, niveau, valide, user_id, theme_id) VALUES (:scores, :temps, :niveau, 1, :user_id, :theme_id)");
        $r->bindParam(':scores', $scores, PDO::PARAM_INT);
        $r->bindParam(':temps', $temps, PDO::PARAM_STR);
        $r->bindParam(':niveau', $niveau, PDO::PARAM_INT);
        $r->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $r->bindParam(':theme_id', $theme_id, PDO::PARAM_INT);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }


    //* Traitement du classement principal
    public function get_all_main_leaderboard()
    {
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores, repondre.temps, theme.id, theme.nom_theme, repondre.niveau
        FROM repondre
        INNER JOIN user ON repondre.user_id = user.id
        INNER JOIN theme ON repondre.theme_id = theme.id
        ORDER BY scores DESC
        LIMIT 10");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_result_quizz_user()
    {
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores, repondre.temps, theme.id, theme.nom_theme, repondre.niveau
            FROM repondre
            INNER JOIN user ON repondre.user_id = user.id
            INNER JOIN theme ON repondre.theme_id = theme.id
            ORDER BY repondre.id DESC
            LIMIT 1");
        $r->execute();

        return $r->fetch(PDO::FETCH_OBJ);
    }
}