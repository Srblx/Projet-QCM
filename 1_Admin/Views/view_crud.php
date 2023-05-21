<table>
  <tr>
    <td>
      <div class="form_recherche_utilisateur">
        <form action="controller=crud&action=crud_utilisateur_recherche" method="post" class="form_recherche_utilisateur">
          <input type="submit" class="submit_recherche_all_user" value="Tous les Utilisateurs">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_utilisateur_recherche" class="form_swearch_user_name">
          <select name="all_name_user" id="all_name_user">
            <option value="Par nom">Par nom</option>
            <?php foreach ($user_name_list as $unl) : ?>
              <option value="<?= $n->$name ?>"><?= $n->$name ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_utilisateur_recherche" class="form_swearch_user_pseudo">
          <select name="all_pseudo_user" id="all_pseudo_user">
            <option value="Par pseudo">Par Pseudo</option>
            <?php foreach ($user_pseudo_list as $unl) : ?>
              <option value="<?= $n->$pseudo ?>"><?= $n->$pseudo ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_utilisateur_recherche" class="form_swearch_user_mail">
          <select name="all_mail_user" id="all_mail_user">
            <option value="Par mail">Par mail</option>
            <?php foreach ($user_mail_list as $unl) : ?>
              <option value="<?= $n->$mail ?>"><?= $n->$mail ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_recherche_mail_user">
        </form>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form_recheche_question_reponse">
        <form action="controller=crud&action=crud_question_reponse_recherche" method="post" class="form_recherche_question_reponse">
          <input type="submit" class="submit_recherche_question_reponse" value="Toutes les Questions/Réponses">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_question_reponse_recherche" class="form_swearch_question_reponse_theme">
          <select name="all_question_reponse" id="all_questions_reponses">
            <option value="Par thème">Par Thèmes</option>
            <?php foreach ($question_reponse_theme_list as $utl) : ?>
              <option value="<?= $utl->$theme ?>"><?= $utl->$theme ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_recherche_theme">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_question_reponse_recherche" class="form_swearch_question_reponse_difficulte">
          <select name="all_question_reponse_difficulte" id="all_question_reponse_difficulte">
            <option value="Par difficulté">Par Difficulté</option>
            <?php foreach ($question_reponse_difficulte_list as $udl) : ?>
              <option value="<?= $udl->$niveau ?>"><?= $udl->$niveau ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" class="submit_recherche_difficulte">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_question_reponse_recherche" class="form_swearch_question_reponse_time">
          <select name="all_question_reponse_time" id="all_question_reponse_time">
            <option value="Par temps">Par Temps</option>
            <?php foreach ($question_reponse_time_list as $qrtl) : ?>
              <option value="<?= $qrtl->$temps ?>"><?= $qrtl->$temps ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_question_reponse_time">
        </form>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form_recherche_resultat_quizz">
        <form action="controller=crud&action=crud_resultat_utilisateur" method="post" class="form_resultat_utilisateur">
          <input type="submit" class="submit_resultat_all_user" value="Tous les Résultats">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_resultat_utilisateur" class="form_score_resultat">
          <select name="all_score_resultat" id="all_score_resultat">
            <option value="Par Score">Par Score</option>
            <?php foreach ($user_score_resultat as $usr) : ?>
              <option value="<?= $usr->$a ?>"><?= $usr->$a ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_resultat_utilisateur" class="form_resultat_utilisateur">
          <select name="all_user_resultat" id="all_user_resultat">
            <option value="Par nom">Par Nom</option>
            <?php foreach ($user_resultat as $ur) : ?>
              <option value="<?= $ur->$a ?>"><?= $ur->$a ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td>
      <div class="select_submit">
        <form action="controller=crud&action=crud_resultat_utilisateur" class="form_swearch_resultat_utilisateur">
          <select name="all_mail_user" id="all__resultat_utilisateur">
            <option value="Par mail">Par mail</option>
            <?php foreach ($user_date_resultat as $udr) : ?>
              <option value="<?= $udr->$mail ?>"><?= $udr->$mail ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
  </tr>
</table>