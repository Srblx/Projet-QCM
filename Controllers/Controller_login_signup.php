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

		if (isset($_POST['submit_form_connexion'])) {
			$m = Model::get_model();
			$user = $m->get_connexion();

			if ($user) {
				$id = $user->id;
				$nom = $user->nom;
				$prenom = $user->prenom;
				$pseudo = $user->pseudo;
				$mail = $user->mail;
				$est_administrateur = $user->admin;
				if (session_status() != PHP_SESSION_ACTIVE) {
					session_start();
				}
				// session_start();
				$_SESSION['id'] = $id;
				$_SESSION['nom'] = $nom;
				$_SESSION['prenom'] = $prenom;
				$_SESSION['pseudo'] = $pseudo;
				$_SESSION['mail'] = $mail;
				$_SESSION['admin'] = $est_administrateur;
				$_SESSION['login'] = true;
				if ($_SESSION['admin'] === 1) {
					header('Location: 1_Admin/?controller=home&action=home');
				} else {
					header('Location: 2_User/?controller=home&action=home');
					exit();
				}
				if (!$user) {
					header('Location: ?controller=home&action=home');
					exit();
				}
			}
			$this->render("home");
		}
	}

	public function action_logout()
	{
		// Démarre la mise en mémoire tampon
		ob_start();

		// Récupération des informations de cookie actuelles
		$params = session_get_cookie_params();

		// Expire le cookie en le réglant sur hier
		setcookie(session_name(), '', strtotime('-1 day'), $params['path'], $params['domain'], $params['secure'], $params['httponly']);

		// Détruit toutes les variables d'une session
		session_unset();

		// Destruction de la session
		session_destroy();

		// Redirection vers la page d'accueil
		header("Location: ?controller=home&action=home");

		// Vide la sortie mise en mémoire tampon sans l'envoyer au navigateur
		ob_end_clean();

		// $this->render("home");
	}


	public function valid_input($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}
}