<?php

class Controller_login_signup extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function aciton_home()
	{
		$this->render('home');
	}

	public function action_login()
	{
		$this->render("login");
	}

	public function action_signup()
	{
		$this->render("signup");
	}

	public function action_signup_validate()
	{
		$this->render("login");
	}
	
	
    
}
