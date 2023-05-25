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
    $data = ["all_theme" => $m->get_all_theme(),
        // * "all_user_bd" =>get_all_info_bd(), 
        // ^ Voir model !!
        "all_niveau" => $m->get_all_niveau(),
        "all_user_name" => $m->get_all_user_names(),
        "all_user_pseudo" => $m->get_all_user_pseudo(),
        "all_user_mail" => $m->get_all_user_mail(),
         "all_temps" => $m->get_all_temps(),
         "all_score" => $m->get_all_score(),
         "all_noms" => $m->get_all_noms(), "all_mails" => $m->get_all_mail()];
        $this->render("crud", $data);

        //  $m = Model::get_model();
        // $data = ["all_information_bd" => $m->get_all_information()];
        // $this->render("crud", $data);
    }

    public function action_crud_utilisateur_recherche()
{
    $m = Model::get_model();

    if (isset($_POST['submit_recherche_all_user'])) {
        $data = ["all_users" => $m->get_all_user(), "position" => 1];
        $this->render("crud_recherche", $data);
    } 

    elseif (isset($_POST['submit_all_user_name'])) {
        $data = ["all_user_name" => $m->get_all_user_name_affiche(), "position" => 2];
        $this->render("crud_recherche", $data);
    }

    elseif (isset($_POST['submit_all_user_pseudo'])) {
        $data = ["all_user_pseudo" => $m->get_all_user_pseudo_affiche(), "position" => 3];
        $this->render("crud_recherche", $data);
    } 
    
    elseif (isset($_POST['submit_recherche_mail_user'])) {
        $data = ["all_user_mail" => $m->get_all_user_mail_affiche(), "position" => 4];
        $this->render("crud_recherche", $data);
    } 
    
    elseif (isset($_POST['submit_recherche_theme'])) {
        $data = ["all_question_reponse_theme" => $m->get_all_question_reponse_theme(), "position" => 6];
        $this->render("crud_recherche", $data);
    } 
    
   
    
    // elseif (isse($_POST['submit_question_reponse_time'])) {
    //     $data = ["all_question_reponse_time" => $m->get_all_question_reponse_time(), "position" => 7];
    //     $this->render("crud_recherche", $data);
    // } 
    
    // elseif (isset($_POST['submit_all_result_score'])) {
    //     $data = ["all_score_resultat" => $m->get_all_score_resultat(), "position" => 8];
    //     $this->render("crud_recherche", $data);
    // } 
    //  {
    //     // Cas où aucun bouton n'est soumis ou aucun cas ne correspond
    //     $data = ["error_message" => "Erreur : Veuillez sélectionner une option de recherche.", "position" => 0];
    //     $this->render("crud", $data);
    //     // Gérer l'erreur ou le comportement par défaut ici
    // }
}

    public function action_crud_question_reponse_recherche()
    {
        $m = Model::get_model();
        if (isset($_POST["all_question_reponse_recherche"])) {
        $data = ["all_question_reponse" => $m->get_all_question_reponse_recherche(), "position" => 5];
        $this->render("crud_recherche", $data);
        }
        elseif (isset($_POST["submit_recherche_theme"])) {
            $data = ["all_question_reponse_theme" => $m->get_all_question_reponse_recherche_theme(), "position" => 6];
            $this->render("crud_recherche", $data);
        }
        elseif (isset($_POST["submit_recherche_difficulte"])) {
            $data = ["all_question_reponse_difficulte" => $m->get_all_question_reponse_difficulte(), "position" => 7];
            $this->render("crud_recherche", $data);
        } 
        }
    

    public function action_crud_resultat_utilisateur()
    {
        $m = Model::get_model();
        $data = ["all_score" => $m->get_all_result(), "position" => 9];
        $this->render("crud_recherche", $data);
    }
}
