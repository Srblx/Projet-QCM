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
      

        if ($stmt->rowCount() > 0 ) {

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
}