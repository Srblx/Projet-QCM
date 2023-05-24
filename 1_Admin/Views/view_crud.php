<div class="table_container">
  <?php
  echo "<pre>";
  // var_dump($all_information_bd); 
  echo "</pre>";
   
   ?>
<table>
  <tr class="tr_crud">
    <td class="td_form">
      <div class="form_recherche_utilisateur">
        <form action="?controller=crud&action=crud_utilisateur_recherche" method="post" class="form_recherche_utilisateur">
          <input type="submit" class="submit_recherche_all_user" value="Tous les Utilisateurs" name="submit_recherche_all_user">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_utilisateur_recherche" class="form_swearch_user_name">
          <select name="all_name_user" id="all_name_user">
            <option value="Par nom">Recherche par Nom</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->nom ?>"><?= $aib->nom ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_all_user_name">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_utilisateur_recherche" class="form_swearch_user_pseudo">
          <select name="all_pseudo_user" id="all_pseudo_user">
            <option value="Par pseudo">Recherche par Pseudo</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->pseudo ?>"><?= $aib->pseudo ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_utilisateur_recherche" class="form_swearch_user_mail">
          <select name="all_mail_user" id="all_mail_user">
            <option value="Par mail">Recherche par Mail</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->email ?>"><?= $aib->email ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_recherche_mail_user">
        </form>
      </div>
    </td>
  </tr>
  <tr class="tr_crud">
    <td class="td_form">
      <div class="form_recheche_question_reponse">
        <form action="?controller=crud&action=crud_question_reponse_recherche" method="post" class="form_recherche_question_reponse">
          <input type="submit" class="submit_recherche_question_reponse" value="Toutes les Questions/Réponses">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_question_reponse_recherche" class="form_swearch_question_reponse_theme">
          <select name="all_question_reponse" id="all_questions_reponses">
            <option value="Par thème">Recherche par Thèmes</option>
            <?php foreach ($all_theme as $aib) : ?>
              <option value="<?= $aib->nom_theme ?>"><?= $aib->nom_theme ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_recherche_theme">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_question_reponse_recherche" class="form_swearch_question_reponse_difficulte">
          <select name="all_question_reponse_difficulte" id="all_question_reponse_difficulte">
            <option value="Par difficulté">Recherche par Difficulté</option>
            <?php foreach ($all_niveau as $aib) : ?>
              <option value="<?= $aib->niveau ?>"><?= $aib->niveau ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" class="submit_recherche_difficulte">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_question_reponse_recherche" class="form_swearch_question_reponse_time">
          <select name="all_question_reponse_time" id="all_question_reponse_time">
            <option value="Par temps">Recherche par Temps</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->tps_question ?>"><?= $aib->tps_question ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche" name="submit_question_reponse_time">
        </form>
      </div>
    </td>
  </tr>
  <tr class="tr_crud">
    <td class="td_form">
      <div class="form_recherche_resultat_quizz">
        <form action="?controller=crud&action=crud_resultat_utilisateur" method="post" class="form_resultat_utilisateur">
          <input type="submit" class="submit_resultat_all_user" value="Tous les Résultats">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_resultat_utilisateur" class="form_score_resultat">
          <select name="all_score_resultat" id="all_score_resultat">
            <option value="Par Score">Recherche par Score</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->scores ?>"><?= $aib->scores ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_resultat_utilisateur" class="form_resultat_utilisateur">
          <select name="all_user_resultat" id="all_user_resultat">
            <option value="Par nom">Recherche par Nom</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->nom ?>"><?= $aib->nom ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
    <td class="td_form">
      <div class="select_submit">
        <form action="?controller=crud&action=crud_resultat_utilisateur" class="form_swearch_resultat_utilisateur">
          <select name="all_mail_user" id="all__resultat_utilisateur">
            <option value="Par mail">Recherche par mail</option>
            <?php foreach ($all_information_bd as $aib) : ?>
              <option value="<?= $aib->email ?>"><?= $aib->email ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Lancer la recherche">
        </form>
      </div>
    </td>
  </tr>
</table>
</div>