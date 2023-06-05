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
        $m = Model::get_model();
        $data = ["questions" => $m->get_random_question()];

        //* Rendu de la vue "question" avec les données
        $this->render("generate_questions", $data);
    }

    public function action_une_question()
    {
        $cpt = $_SESSION['cpt'];
        $liste_id = $_SESSION['liste_id'];
        $score = 0;
        $_SESSION['score'] = $score;

        $id_question = $liste_id[$cpt]->id;

        $m = Model::get_model();
        $data = [
            "question" => $m->get_une_question($id_question),
            "reponses" => $m->get_les_responses($id_question)
        ];

        // $cpt++;
        // $_SESSION['cpt'] = $cpt;
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
            $ListeReponseUser = $_SESSION['ListeReponseUser'];
            $cpt = $_SESSION['cpt'];
            $ListeReponseUser[$cpt] = $reponseUtilisateur;
            $_SESSION['ListeReponseUser'] = $ListeReponseUser;
            // ^ creer un tableau est stocker les element 1 par 1 
            // ?ensuite faire la coparaison pour la correction 
            // ^ Incrémentation du timer
            $_SESSION['timer'];
            $_SESSION['timer'] = $_SESSION['timer'] + (45 - intval($_POST["timer_value"]));


            $m = Model::get_model();
            if ($cpt < 19) {
                $liste_id = $_SESSION['liste_id'];
                $id_question = $liste_id[$cpt]->id;
                $LreponseUser = $_SESSION['ListeReponseUser'];
                $reponseUser = $LreponseUser[$cpt];
                $LreponseDB = $_SESSION['ListeReponseDB'];
                $reponseDB = $LreponseDB[$cpt];
                echo $reponseDB . " " . $reponseUser;

                if ($reponseDB == $reponseUser) {
                    $score = $_SESSION['score'];
                    echo "OK : " . $score;
                    $score++;
                    $_SESSION['score'] = $score;
                }
                $cpt = $_SESSION['cpt'];
                $cpt++;
                $liste_id = $_SESSION['liste_id'];
                $id_question = $liste_id[$cpt]->id;
                $_SESSION['cpt'] = $cpt;
                $score = $_SESSION['score'];
                $m = Model::get_model();
                $data = [
                    "question" => $m->get_une_question($id_question),
                    "reponses" => $m->get_les_responses($id_question)
                ];

                $this->render("une_question", $data);
            } else {
                $liste_id = $_SESSION['liste_id'];
                $id_question = $liste_id[$cpt]->id;
                $LreponseUser = $_SESSION['ListeReponseUser'];
                $reponseUser = $LreponseUser[$cpt];
                $LreponseDB = $_SESSION['ListeReponseDB'];
                $reponseDB = $LreponseDB[$cpt];

                if ($reponseDB == $reponseUser) {
                    $score = $_SESSION['score'];
                    $score++;
                    echo "OK : " . $score;
                    $_SESSION['score'] = $score;
                }

                $cpt = $_SESSION['cpt'];
                // Récupération de la valeur stockée en session
                $time = $_SESSION['timer'];

                // Conversion en minutes et secondes
                $minutes = floor($time / 60); // Récupère la partie entière des minutes
                $secondes = $time % 60; // Récupère le reste, qui représente les secondes

                // requete pour inserer dans la table repondre
                $score = $_SESSION['score'];
                $temps = $minutes . $secondes;
                $niveau = $_SESSION['niveau'];
                $user_id = $_SESSION['id'];
                $theme_id = $_SESSION['theme'];

                $m = Model::get_model();
                $m->get_insert_repondre($score, $temps, $niveau, $user_id, $theme_id);

                unset($_SESSION['timer']);
                header("Location: ?controller=leaderboard&action=leaderboard_fin_quizz");
            }
        }
    }

    public function action_correction()
    {
        $cpt = $_SESSION['cpt'];
        $liste_id = $_SESSION['liste_id'];

        if ($cpt > -1) {
            $id_question = $liste_id[$cpt]->id; // Récupérer l'ID de la dernière question répondue
            $reponseUser = $_SESSION['ListeReponseUser'][$cpt]; // Récupérer la réponse de l'utilisateur pour cette question
            $_SESSION['cpt']--;

            $m = Model::get_model();
            $data = [
                "question" => $m->get_une_question($id_question),
                "reponses" => $m->get_les_responses($id_question),
                "reponseUser" => $reponseUser
            ];

            $this->render("correction", $data);
        } else {
            header("Location: ?controller=leaderboard&action=leaderboard_fin_quizz");
        }
    }
}