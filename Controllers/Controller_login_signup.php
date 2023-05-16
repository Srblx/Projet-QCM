<?php

class Controller_login_signup extends Controller
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

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Validation des données d'entrée
			$Nom = filter_input(INPUT_POST, 'input_nom', FILTER_SANITIZE_STRING);
			$Prenom = filter_input(INPUT_POST, 'input_prenom', FILTER_SANITIZE_STRING);
			$Pseudo = filter_input(INPUT_POST, 'input_pseudo', FILTER_SANITIZE_STRING);
			$Mail = filter_input(INPUT_POST, 'input_mail', FILTER_VALIDATE_EMAIL);
			$Password = filter_input(INPUT_POST, 'input_password', FILTER_UNSAFE_RAW);
			$Password_confirm = filter_input(INPUT_POST, 'input_cPassword', FILTER_UNSAFE_RAW);
			

			$Nom = $this->valid_input($Nom);
			$Prenom = $this->valid_input($Prenom);
			$Mail = $this->valid_input($Mail);
			$Pseudo = $this->valid_input($Pseudo);
			$Password = $this->valid_input($Password);
			$Password_confirm = $this->valid_input($Password_confirm);

			
			// Hash de mot de passe
			$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

			// Insertion dans la base de données via le modèle
			$m = Model::get_model();
			$m->get_inscription($Nom, $Prenom, $Pseudo, $Mail, $hashedPassword);

			$this->render("login");

		} else {

			$this->render("connexion");
		}
	
		$this->render("login");
	}

	public function action_login_validate()
	{
		$this->render("home");
	}

	public function valid_input($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}
}
