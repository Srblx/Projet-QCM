<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light" id="nav_nav">
	<a class="navbar-brand" href="?controller=home&action=home"><img src="Content/img/logo_detoure.png" alt="" width="3%" class="img_logo_nav">
		ByteMaster
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon" id="menu_hamburger"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="?controller=home&action=home">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?controller=leaderboard&action=leaderboard">Classement</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?controller=home&action=about">F.A.Q</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?controller=contact&action=contact">Contact</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?controller=crud&action=crud">C.R.U.D</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user"></i>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="?controller=profile&action=profile">Profil</a>
					<a class="dropdown-item" href="../?controller=login_signup&action=logout" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
</header>