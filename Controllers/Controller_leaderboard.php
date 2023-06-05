<?php

class Controller_leaderboard extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_home()
	{
		$this->render('home');
	}

	public function action_leaderboard()
	{
		$m = Model::get_model();
		$data = ["users" => $m->get_all_main_leaderboard()];
		$this->render("leaderboard", $data);
	}
}