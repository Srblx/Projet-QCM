<?php 


class Controller_crud extends Controller {

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
        $this->render("crud");
    }
    
    
    // public function action_crud_utilisateur_recherche()
    // {
    //     $m = Model::get_model();
    //     $data = ["utilisateur_name" => $m->get_all_utilisateur_name(), "position" => 1];
    //     $this->render("crud", $data);
    // }
    
    public function action_crud_question_reponse_recherche()
    {
        $this->render("crud");
    }

    public function action_crud_utilisateur_recherche()
    {
        if($_POST['submit_recherche_all_user']) {
            $m = Model::get_model();
            $data = ["all_users" => $m->get_all_user()];
            $this->render("crud_recherche", $data);
        }
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

