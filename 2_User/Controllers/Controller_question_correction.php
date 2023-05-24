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
        $_SESSION['question'] = $_GET['question'];

        //* Incrémentation du numéro de question si le paramètre 'question' est défini
        if (isset($_GET['question'])) {
            $_SESSION['question'] = $_GET['question'] + 1;
        }

        //* Redirection vers la page d'accueil si le numéro de question dépasse 20
        if ($_GET['question'] > 20) {
            unset($_SESSION['question']);
            $_SESSION['alert'] = "<script>alert('Quizz terminé')</script>";
            header("Location: ?controller=home&action=home");
            die;
        }

        $m = Model::get_model();
        $data = ["questions" => $m->get_random_question()];

        //* Rendu de la vue "question" avec les données
        $this->render("question", $data);
    }
}