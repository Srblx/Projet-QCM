<main id="home-main">
  <img id="home-logo-img" src="Content/img/logo_detoure.png" alt="#">
  <button id="home-btn-jouer">
    <a class="link-home-btn-jouer" href="?controller=login_signup&action=login">
      <span id="home-span-jouer">Jouer</span>
    </a>
  </button>
</main>


<?php
if (isset($_SESSION['timer'])) {
  unset($_SESSION['timer']);
}

if (isset($_SESSION['theme']) || isset($_SESSION['niveau'])) {
  unset($_SESSION['theme']);
  unset($_SESSION['niveau']);
}
?>