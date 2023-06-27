<?php

require_once('./Config/config.php');

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

    public function get_inscription($Nom, $Prenom, $Pseudo, $Mail, $Password)
    {

        $requete = "SELECT * FROM user WHERE email = :Mail";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':Mail', $Mail);
        $stmt->execute();
        $stmt->fetch();

        if ($stmt->rowCount() == 0) {
            $r = "INSERT INTO user (`nom`, `prenom`, `pseudo`, `email`, `password`, `admin`) 
            VALUES (:Nom, :Prenom, :pseudo, :Mail, :Password, '0')";
            $stmt = $this->bd->prepare($r);
            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':Prenom', $Prenom);
            $stmt->bindParam(':pseudo', $Pseudo);
            $stmt->bindParam(':Mail', $Mail);
            $stmt->bindParam(':Password', $Password);
            $stmt->execute();

            $error = false; // Pas d'erreur
        } else {
            $error = true; // L'e-mail existe déjà
        }

        return $error;
    }

    public function get_connexion()
    {
        $email = filter_var(trim(htmlspecialchars($_POST['mail_connexion'], FILTER_VALIDATE_EMAIL)));
        $password = filter_var(trim(htmlspecialchars($_POST['password_connexion'], FILTER_SANITIZE_STRING)));

        $requete = "SELECT * FROM user WHERE email=:email";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if (password_verify($password, $user->password)) {
                // Le mot de passe est correct, renvoie l'utilisateur
                return $user;
            } else {
                // Le mot de passe est incorrect
                $_SESSION['error'] = "<script>alert('Le mot de passe est incorrect !');</script>";
                return false;
            }
        } else {
            // L'utilisateur n'existe pas dans la base de données
            $_SESSION['error'] = "<script>alert('Cette adresse e-mail n\'est pas enregistrée, veuillez vous inscrire !');</script>";
            return false;
        }
    }



    private function valid_input($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    //* Traitement du classement principal
    public function get_all_main_leaderboard()
    {
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores,
         repondre.temps, theme.id, theme.nom_theme, repondre.niveau
        FROM repondre
        INNER JOIN user ON repondre.user_id = user.id
        INNER JOIN theme ON repondre.theme_id = theme.id
        ORDER BY scores DESC, temps ASC");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }
}