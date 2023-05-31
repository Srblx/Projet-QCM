<main id="home-main">
  <img src="Content/img/logo_detoure.png" alt="#" style="width: 30%; height: 60%;">
  <button id="home-btn-jouer"><span id="home-span-jouer">Jouer</span></button>
</main>

<?php
if (isset($_SESSION['timer'])) {
  unset($_SESSION['timer']);
}

var_dump($_SESSION);
?>