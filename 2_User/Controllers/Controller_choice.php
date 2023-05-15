<?php

class Controller_choice extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_choice()
	{
		$this->render("choice");
	}

	public function action_choice_difficulty()
	{
		$this->render("choice_difficulty");
	}

}