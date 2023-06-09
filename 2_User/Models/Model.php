<?php

require_once('../Utils/config.php');

class Model
{
    private $bd;
    private static $instance = null;

    /*
     * Constructeur créant l'objet PDO et l'affectant à $bd
     */
    private function __construct()
    {
        // Établissement de la connexion PDO à la base de données
        $this->bd = new PDO(DSN, LOGIN, MDP);
        $this->bd->query("SET NAMES 'utf8'");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //* get_model()

    public static function get_model()
    {
        // Méthode pour créer une instance unique du modèle
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_random_question()
    {
        // Récupère une liste de questions aléatoires en fonction de l'ID du thème et du niveau
        $id = $_GET['theme'];
        $niveau = $_GET['niveau'];
        $r = $this->bd->prepare("
            SELECT id
            FROM question WHERE theme_id = :id AND question.niveau = :niveau
            ORDER BY RAND()
            LIMIT 10
        ");
        $r->bindParam(':id', $id, PDO::PARAM_INT);
        $r->bindParam(':niveau', $niveau, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_une_question($id_question)
    {
        // Récupère une seule question en fonction de son ID
        $r = $this->bd->prepare("SELECT * FROM question WHERE id = :id_question");
        $r->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function get_les_responses($id_question)
    {
        // Récupère les réponses associées à une question en fonction de son ID
        $r = $this->bd->prepare("SELECT reponse, question_id, correct FROM reponse WHERE question_id = :id_question");
        $r->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_insert_repondre($scores, $temps, $niveau, $user_id, $theme_id)
    {
        // Insère les résultats de l'utilisateur dans la table "repondre"
        $r = $this->bd->prepare("INSERT INTO repondre (scores, temps, niveau, valide, user_id, theme_id) VALUES (:scores, :temps, :niveau, 1, :user_id, :theme_id)");
        $r->bindParam(':scores', $scores, PDO::PARAM_INT);
        $r->bindParam(':temps', $temps, PDO::PARAM_STR);
        $r->bindParam(':niveau', $niveau, PDO::PARAM_STR);
        $r->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $r->bindParam(':theme_id', $theme_id, PDO::PARAM_INT);
        $r->execute();
    }

    public function get_all_main_leaderboard()
    {
        // Récupère les résultats des meilleurs utilisateurs dans le classement principal
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores, repondre.temps, theme.id, theme.nom_theme, repondre.niveau
        FROM repondre
        INNER JOIN user ON repondre.user_id = user.id
        INNER JOIN theme ON repondre.theme_id = theme.id
        ORDER BY scores DESC
        ");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_all_user_leaderboard()
    {
        $theme = $_SESSION['theme'];
        $niveau = $_SESSION['niveau'];
        // Récupère les résultats des meilleurs utilisateurs dans le classement principal
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores, repondre.temps, theme.id, theme.nom_theme, repondre.niveau
            FROM repondre
            INNER JOIN user ON repondre.user_id = user.id
            INNER JOIN theme ON repondre.theme_id = theme.id
            WHERE repondre.theme_id = :theme
            AND repondre.niveau = :niveau
            ORDER BY scores DESC
            LIMIT 10");

        $r->bindParam(':theme', $theme);
        $r->bindParam(':niveau', $niveau);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_result_quizz_user()
    {
        // Récupère les résultats du dernier utilisateur ayant passé le quiz
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores, repondre.temps, theme.id, theme.nom_theme, repondre.niveau
            FROM repondre
            INNER JOIN user ON repondre.user_id = user.id
            INNER JOIN theme ON repondre.theme_id = theme.id
            ORDER BY repondre.id DESC
            LIMIT 1");
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }


    public function get_count_quizz_user_html()
    {
        $id_user = $_SESSION["id"];
        $query = "SELECT COUNT(*) AS total FROM repondre r
        INNER JOIN theme t ON r.theme_id = t.id WHERE r.user_id = $id_user AND t.id = 1";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_count_quizz_user_css()
    {
        $id_user = $_SESSION["id"];
        $query = "SELECT COUNT(*) AS total FROM repondre r
        INNER JOIN theme t ON r.theme_id = t.id WHERE r.user_id = $id_user AND t.id = 2";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_count_quizz_user_js()
    {
        $id_user = $_SESSION["id"];
        $query = "SELECT COUNT(*) AS total FROM repondre r
        INNER JOIN theme t ON r.theme_id = t.id WHERE r.user_id = $id_user AND t.id = 3";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_count_quizz_user_php()
    {
        $id_user = $_SESSION["id"];
        $query = "SELECT COUNT(*) AS total FROM repondre r
        INNER JOIN theme t ON r.theme_id = t.id WHERE r.user_id = $id_user AND t.id = 4";
        $r = $this->bd->prepare($query);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

}