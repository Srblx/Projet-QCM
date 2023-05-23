<?php

class Controller_choice extends Controller
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

	public function action_choice()
	{
		$this->render("choice");
	}

	public function action_choice_difficulty()
	{
		$this->render("choice_difficulty");
	}

	public function action_demarrage_quizz()
	{
		$this->render("demarrage_quizz");
	}
}