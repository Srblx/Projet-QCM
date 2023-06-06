<?php

class Controller_profile extends Controller
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

	public function action_profile()
	{
		$m = Model::get_model();
		$data = ["questionnaire_user_html" => $m->get_count_quizz_user_html(),
		"questionnaire_user_css" => $m->get_count_quizz_user_css(),
		"questionnaire_user_js" => $m->get_count_quizz_user_js(),
		"questionnaire_user_php" => $m->get_count_quizz_user_php()];
		$this->render("profile", $data);
	}
}