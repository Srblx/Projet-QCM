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
		$this->render("leaderboard");
	}
}
