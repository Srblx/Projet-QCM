<main id="signup_main">
  <form class="form" action="?controller=login_signup&action=signup_validate" method="POST">
    <div class="form-title"><span>Inscription</span></div>
    <div class="title-2">ByteMaster</div>
    <div class="input-container">
      <input class="input-nom" type="text" placeholder="Entrer Nom" name="input_nom"><sup class="sup_form_inscription"> *</sup>
      <span class="error-message-nom"></span>
    </div>
    <div class="input-container">
      <input class="input-prenom" type="text" placeholder="Entrer Prenom" name="input_prenom"><sup class="sup_form_inscription"> *</sup>
      <span class="error-message-prenom"></span>
    </div>
    <div class="input-container">
      <input class="input-pseudo" type="text" placeholder="Entrer Pseudo" name="input_pseudo"><sup class="sup_form_inscription"> *</sup>
      <span class="error-message-prenom"></span>
    </div>
    <div class="input-container">
      <input class="input-mail" type="email" placeholder="Entrer email" name="input_mail"><sup class="sup_form_inscription"> *</sup>
      <span class="error-message-email"></span>
    </div>

    <section class="bg-stars">
      <span class="star"></span>
      <span class="star"></span>
      <span class="star"></span>
      <span class="star"></span>
    </section>

    <div class="input-container">
      <input class="input-pwd" type="password" placeholder="Entrer Mot de Passe" name="input_password"><sup class="sup_form_inscription"> *</sup>
      <span class="error-message-password"></span>
    </div>
    <div class="input-container">
      <input class="input-cpwd" type="password" placeholder="Confirmer Mot de Passe" name="input_cPassword"><sup class="sup_form_inscription"> *</sup>
      <span class="error-message-cpassword"></span>
    </div>
    <div class="condition_general_utilisation">
      <p class="text_condition_generales">
        <label class="label_checkbox_condition" for="condition_general"></label><sup class="sup_form_inscription"> *</sup>
        <span id="checkbox_condition_inscription_erreur" class="erreur"></span>
        <input type="checkbox" name="condition_general" id="condition_general">
        <br>
        <span class="error-message-checkbox"></span>
        En cochant cette case, j'accepte <a href="?controller=condition&action=condition" class="link_condition_generales">les conditions
          générales d'utilisation</a>
      </p>
    </div>
    <input type="submit" class="submit_form_inscription" value="Inscription" name="submit_form_inscription">

    </input>

    <p class="signup-link">
      Vous avez déjà un compte?
      <a href="?controller=login_signup&action=login" class="up">Connexion</a>
    </p>

  </form>
</main>