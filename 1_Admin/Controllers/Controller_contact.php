<?php

class Controller_contact extends Controller
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

	public function action_contact()
	{
		$this->render("contact");
	}
}
