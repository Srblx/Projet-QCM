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
        $this->render("question");
    }
}