<?php

require_once 'Controller.php';

class Controller_question_correction extends Controller
{
    //* L'action par défaut redirige vers l'action "home"
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    public function action_question()
    {
        //* Stockage de la question actuelle dans la session
        // $_SESSION['question'] = $_GET['question'];

        //* Incrémentation du numéro de question si le paramètre 'question' est défini
        // if (isset($_GET['question'])) {
        //    $_SESSION['question'] = $_GET['question'] + 1;
        //}

        //* Redirection vers la page d'accueil si le numéro de question dépasse 20
        //if ($_GET['question'] > 20) {
        //    unset($_SESSION['question']);
        //    $_SESSION['alert'] = "<script>alert('Quizz terminé')</script>";
        //    header("Location: ?controller=home&action=home");
        //    die;
        //}

        $m = Model::get_model();
        $data = ["questions" => $m->get_random_question()];

        //* Rendu de la vue "question" avec les données
        $this->render("generate_questions", $data);
    }

    public function action_une_question()
    {
        $cpt = $_SESSION['cpt'];
        $liste_id = $_SESSION['liste_id'];

        $id_question = $liste_id[$cpt]->id;

        $m = Model::get_model();
        $data = [
            "question" => $m->get_une_question($id_question),
            "reponses" => $m->get_les_responses($id_question)
        ];

        $cpt++;
        $_SESSION['cpt'] = $cpt;
        $this->render("une_question", $data);
    }

    public function action_question_suivante()
    {

        $reponseUtilisateur = "";
        if (!empty($_POST["submit_question"])) {
            // ^ Traitement de la question precedente 
            if (isset($_POST["qst1"])) {
                $reponseUtilisateur .= "1";
            } else {
                $reponseUtilisateur .= "0";
            }
            if (isset($_POST["qst2"])) {
                $reponseUtilisateur .= "1";
            } else {
                $reponseUtilisateur .= "0";
            }
            if (isset($_POST["qst3"])) {
                $reponseUtilisateur .= "1";
            } else {
                $reponseUtilisateur .= "0";
            }
            if (isset($_POST["qst4"])) {
                $reponseUtilisateur .= "1";
            } else {
                $reponseUtilisateur .= "0";
            }
            $_SESSION['reponseUtilisateur'] = $reponseUtilisateur;
            // ^ creer un tableau est stocker les element 1 par 1 
            // ?ensuite faire la coparaison pour la correction 
            // ^ Incrémentation du timer
            $_SESSION['timer'];
            $_SESSION['timer'] = $_SESSION['timer'] + (45 - intval($_POST["timer_value"]));

            $cpt = $_SESSION['cpt'];
            $cpt++;
            if ($cpt < 20) {
                $_SESSION['cpt'] = $cpt;
                $liste_id = $_SESSION['liste_id'];
                $id_question = $liste_id[$cpt]->id;

                $m = Model::get_model();
                $data = [
                    "question" => $m->get_une_question($id_question),
                    "reponses" => $m->get_les_responses($id_question)
                ];

                $this->render("une_question", $data);
            } else {
                // Récupération de la valeur stockée en session
                $time = $_SESSION['timer'];

                // Conversion en minutes et secondes
                $minutes = floor($time / 60); // Récupère la partie entière des minutes
                $secondes = $time % 60; // Récupère le reste, qui représente les secondes

                // requete pour inserer dans la table repondre
                $scores = 5;
                $temps =  $minutes . $secondes;
                $niveau = 2;
                $user_id = $_SESSION['id'];
                $theme_id = 1;

                $m = Model::get_model();
                $m->get_insert_repondre($scores, $temps, $niveau, $user_id, $theme_id);

                unset($_SESSION['timer']);
                header("Location: ?controller=leaderboard&action=leaderboard_fin_quizz");
            }
        }
    }
}
