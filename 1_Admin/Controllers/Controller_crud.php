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
        elseif (isset($_POST["submit_question_reponse_time"])) {
            $data = ["all_question_reponse_time" => $m->get_all_question_reponse_time(), "position" => 8];
            $this->render("crud_recherche", $data);
        }
        }
    

    public function action_crud_resultat_utilisateur()
    {
        $m = Model::get_model();
        if (isset($_POST["submit_all_result"])) {
        $data = ["all_scores" => $m->get_all_result(), "position" => 9];
        $this->render("crud_recherche", $data);
        } 
        elseif (isset($_POST["submit_all_result_score"])) {
            $data = ["all_scores" => $m->get_all_result_score(), "position" => 10];
            $this->render("crud_recherche", $data); 
        }
        elseif (isset($_POST["submit_all_result_name"])){
            $data = ["all_resultat_nom" => $m->get_all_score_nom(), "position" => 11];
            $this->render("crud_recherche", $data);
        }
        elseif (isset($_POST["submit_all_result_mail"])) {
            $data = ["all_resultat_mail" => $m->get_all_score_mail(), "position" => 12];
            $this->render("crud_recherche", $data);
        }
    }

    public function action_crud_update_user()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $m = Model::get_model();
            $user = $m->get_user_by_id($id);

            if ($user) {
                $data = ["user" => $user];
                $this->render("crud_update_user", $data);
            } else {
                // Utilisateur non trouvé, rediriger vers la page de recherche
                header("Location: ?controller=crud&action=crud");
            }
        } else {
            // Identifiant d'utilisateur non spécifié, rediriger vers la page de recherche
            header("Location: ?controller=crud&action=crud");
        }
    }

    public function action_crud_confirm_update_user()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            
            $m = Model::get_model();
            $m->get_crud_confirm_update_user($id, $nom, $prenom, $pseudo, $email);
        }
        
        $this->action_crud();
    }

    // --------------- Fin CRUD -------------- //

    public function action_update_score()
    {
        if (isset($_SESSION['login']) && $_SESSION['admin'] == 1) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $m = Model::get_model();
                $data = ["update_score" => $m->get_update_score($id)];
                $this->render("crud_update", $data);
            } else if (isset($_POST['submit'])) {
                $m = Model::get_model();
                $m->get_update_score_bdd();
                $data = ["score" => $m->get_update_score_bdd()];
                $this->render("crud_update", $data);
            } else {
                header('Location: ?controller=crud&action=crud_update');
            }
        }
    }

    public function action_delete_score()
    {
        if (isset($_SESSION['login']) && $_SESSION['admin'] == 1) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $m = Model::get_model();
                $m->get_delete_score($id);
                $data = ["all_theme" => $m->get_all_theme(),
                "all_niveau" => $m->get_all_niveau(),
                "all_user_name" => $m->get_all_user_names(),
                "all_user_pseudo" => $m->get_all_user_pseudo(),
                "all_user_mail" => $m->get_all_user_mail(),
                 "all_temps" => $m->get_all_temps(),
                 "all_score" => $m->get_all_score(),
                 "all_noms" => $m->get_all_noms(), "all_mails" => $m->get_all_mail()];
                $this->render("crud", $data);
            }
        }
    }
}