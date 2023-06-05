<?php

require_once 'Controller.php';

class Controller_leaderboard extends Controller
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

	public function action_leaderboard()
	{
		$m = Model::get_model();
		$data = ["users" => $m->get_all_main_leaderboard()];
		$this->render("leaderboard", $data);
	}

	public function action_leaderboard_fin_quizz()
	{
		$m = Model::get_model();
		$data = [
			"users" => $m->get_all_user_leaderboard(),
			"quizz_user" => $m->get_all_result_quizz_user()
		];
		$this->render("leaderboard_user", $data);
	}
}