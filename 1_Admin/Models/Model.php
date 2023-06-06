<?php

require_once('../config.php');

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
        $r = $this->bd->prepare("SELECT user.id AS user_id, user.pseudo, repondre.scores, repondre.temps, theme.id AS theme_id, theme.nom_theme, repondre.niveau, repondre.id FROM repondre INNER JOIN user ON repondre.user_id = user.id INNER JOIN theme ON repondre.theme_id = theme.id ORDER BY scores DESC");
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
        // Récupère une liste de questions aléatoires en fonction de l'ID du thème et du niveau
        $id = $_GET['theme'];
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
        ORDER BY scores DESC, temps ASC
        LIMIT 50
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
            ORDER BY scores DESC, temps ASC
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


    // test Mathieu //

    public function get_user_by_id($id)
    {
        $query = "SELECT * FROM user WHERE id = :id";
        $r = $this->bd->prepare($query);
        $r->bindParam(':id', $id, PDO::PARAM_INT);
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function get_crud_confirm_update_user($id, $nom, $prenom, $pseudo, $email)
    {
        $query = "UPDATE `user` SET `nom` = :nom, `prenom` = :prenom, `pseudo` = :pseudo, `email` = :email WHERE `id` = :id";
        $r = $this->bd->prepare($query);
        $r->bindParam(':id', $id, PDO::PARAM_INT);
        $r->bindParam(':nom', $nom, PDO::PARAM_STR);
        $r->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $r->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $r->bindParam(':email', $email, PDO::PARAM_STR);
        $r->execute();

    public function valid_input($data)
    {
        //todo Supprime les espaces en début et fin de chaîne
        $data = trim($data);
        //todo Supprime les barres obliques inverses de la chaîne
        $data = stripslashes($data);
        //todo Supprime les balises et les caractères spéciaux
        $data = htmlspecialchars($data);
        // $data = filter_var($data, FILTER_SANITIZE_STRING);
        //todo Convertit les caractères spéciaux en entités HTML
        // $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //todo Encode les caractères spéciaux en UTF-8
        // $data = filter_var($data, FILTER_SANITIZE_ENCODED);
        //todo Retourne la chaîne de caractères validée
        return $data;

    }
}

