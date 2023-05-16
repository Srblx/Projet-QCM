      <form class="form" action="?controller=login_signup&action=login_validate" method="POST">
     <div class="form-title"><span>Connexion a votre compte</span></div>
      <div class="title-2">ByteMaster</div>
      <div class="input-container">
        <input class="input-mail" type="email" placeholder="Enter email" name="mail_connexion">
        <span> </span>
      </div>

      <section class="bg-stars">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
      </section>

      <div class="input-container">
        <input class="input-pwd" type="password" placeholder="Enter password" name="password_connexion">
      </div>
      <input type="submit" class="submit_form_connexion" value="Connexion" name="submit_form_connexion">
     

      <p class="signup-link">
        Vous n'avez pas de compte?
        <a href="?controller=login_signup&action=signup" class="up">S'inscrire</a>
      </p>
       
   </form>
