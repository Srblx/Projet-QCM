<?php


class Controller_crud extends Controller
{

    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    public function action_crud()
    {
        $m = Model::get_model();
        $data = [
            "all_temps" => $m->get_all_temps(), "all_theme" => $m->get_all_theme(),
            "all_niveau" => $m->get_all_niveau(), "all_score" => $m->get_all_score(),
            "all_noms" => $m->get_all_noms(), "all_mails" => $m->get_all_mail()
        ];
        $this->render("crud", $data);

        //  $m = Model::get_model();
        // $data = ["all_information_bd" => $m->get_all_information()];
        // $this->render("crud", $data);
    }


    public function action_crud_utilisateur_recherche()
    {
        if ($_POST['submit_recherche_all_user']) {
            $m = Model::get_model();
            $data = ["all_users" => $m->get_all_user(), "position" => 1];
            $this->render("crud_recherche", $data);
        } else if ($_POST['submit_all_user_name']) {
            $m = Model::get_model();
            $data = ["all_user_name" => $m->get_all_user_name(), "position" => 2];
            $this->render("crud_recherche", $data);
        }
    }

    public function action_crud_question_reponse_recherche()
    {
        $m = Model::get_model();
        $data = ["all_question_reponse" => $m->get_all_question_reponse(), "position" => 5];
        $this->render("crud_recherche", $data);
    }

    public function action_crud_resultat_utilisateur()
    {
        $m = Model::get_model();
        $data = ["all_score" => $m->get_all_result(), "position" => 9];
        $this->render("crud_recherche", $data);
    }
}







// crud_utilisateur_pseudo
// crud_utilisateur_mail
// crud_utilisateur_all

// question_reponse_theme
// question_reponse_difficulty
// question_reponse_time
// question_reponse_all

// crud_result_score
// crud_result_time
// crud_result_date
// crud_result_all
