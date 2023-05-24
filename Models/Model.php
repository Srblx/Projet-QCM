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


    //* Traitement de l'envoie du mail
/*     public function get_contact_send_mail()
    {
        if (isset($_POST['contact_submit'])) {
            $to = 'alexmonac13@gmail.com';
            $subject = 'Nouveau message de contact';

            $name = $_POST['contact_name'];
            $email = $_POST['contact_email'];
            $object = $_POST['contact_object'];
            $message = $_POST['contact_message'];

            $headers = "From: $name <$email>" . "\r\n";
            $headers .= "Reply-To: $email" . "\r\n";

            $body = "Nom: $name\n\n";
            $body .= "E-mail: $email\n\n";
            $body .= "Objet: $object\n\n";
            $body .= "Message:\n$message";

            if (mail($to, $subject, $body, $headers)) {
                // L'e-mail a été envoyé avec succès
                echo 'Merci ! Votre message a été envoyé.';
            } else {
                // Une erreur s'est produite lors de l'envoi de l'e-mail
                echo 'Une erreur s\'est produite lors de l\'envoi de votre message. Veuillez réessayer plus tard.';
            }
        }
    } */


    public function get_inscription($Nom, $Prenom, $Pseudo, $Mail, $Password)
    {

        $requete = "SELECT * FROM user WHERE email = :Mail";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':Mail', $Mail);
        $stmt->execute();
        $row = $stmt->fetch();


        if ($stmt->rowCount() < 0) {

            $requete2 = "UPDATE user SET password = :password  WHERE email = :mail";
            $stmt2 = $this->bd->prepare($requete2);
            $stmt2->bindParam(':mail', $Mail);
            $stmt2->bindParam(':password', $Password);
            $stmt2->execute();

        } else if ($stmt->rowCount() > 0) {

            exit('Cet email existe déjà');
        }


        if ($stmt->rowCount() == 0) {


            $r = "INSERT INTO user (`nom`, `prenom`, `pseudo`, `email`, `password`, `admin`) VALUES (:Nom, :Prenom, :pseudo, :Mail, :Password, '0')";
            $stmt = $this->bd->prepare($r);
            $stmt->execute([
                ':Nom' => $Nom,
                ':Prenom' => $Prenom,
                ':pseudo' => $Pseudo,
                ':Mail' => $Mail,
                ':Password' => $Password
            ]);
        }

    }

    public function get_connexion_utilisateur($email, $password)
    {
        $requete = "SELECT * FROM user WHERE email=:email";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password_connexion'])) {
                // Le mot de passe est correct, renvoie l'utilisateur
                return $user;

            } else {
                echo 'mot de passe incorrect';
                echo $password;
                // Le mot de passe est incorrect
                return false;
            }
        } else {
            echo 'l\'utilisateur n\'existe pas';
            // L'utilisateur n'existe pas dans la base de données
            return false;
        }
    }

    public function get_connexion()
    {
        $email = filter_var(trim(htmlspecialchars($_POST['mail_connexion'], FILTER_VALIDATE_EMAIL)));
        $password = filter_var(trim(htmlspecialchars($_POST['password_connexion'], FILTER_SANITIZE_STRING)));

        if (!$email) {
            // L'adresse e-mail n'est pas valide, renvoyer un message d'erreur
            echo "<script>alert('L\'adresse e-mail n\'est pas valide');</script>";
            return;
        }

        $r = $this->bd->prepare("SELECT * FROM user WHERE email=:email");
        $r->bindParam(':email', $email);
        $r->execute();
        $user = $r->fetch(PDO::FETCH_OBJ);

        // Vérifier si l'adresse e-mail existe dans la base de données
        if (!$user) {
            // L'adresse e-mail n'existe pas dans la base de données, renvoyer un message d'erreur
            echo "<script>alert('Cette adresse e-mail n\'est pas enregistrée, veuillez vous inscrire !');</script>";
            return;
        }

        // Vérifier si le mot de passe correspond à celui stocké dans la base de données
        if (!password_verify($password, $user->password)) {
            // Le mot de passe ne correspond pas à celui stocké dans la base de données, renvoyer un message d'erreur
            echo "<script>alert('Le mot de passe est incorrect !');</script>";
            return;
        }

        // // Démarre la session pour stocker l'ID de l'utilisateur connecté
        // $_SESSION['admin'] = $user->id;

        return $user;
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
        $r = $this->bd->prepare("SELECT user.id, user.pseudo, repondre.scores, repondre.temps, theme.id, theme.nom_theme, repondre.niveau
        FROM repondre
        INNER JOIN user ON repondre.user_id = user.id
        INNER JOIN theme ON repondre.theme_id = theme.id
        ORDER BY scores DESC");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }
}