<main id="correction_qcm_main">
    <div class="infos_question_qcm">
        <div class="compteur_question_qcm">
            <p>Question
                <?= $_SESSION['cpt'] + 2 ?>/10
            </p>
        </div>
    </div>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <?php echo "<h3 class='titre_section_demarrage'>" . $question->question . "</h3>"; ?>

            <form id="form_qcm_jouer" method="post" action="?controller=question_correction&action=correction">
                <div class="reponses-qcm">
                    <?php $cptReponse = 1 ?>
                    <?php $ReponseDB = ""; ?>
                    <?php foreach ($reponses as $reponse): ?>
                        <?php
                        $isChecked = false;
                        $isCorrect = false;
                        if (isset($_SESSION['ListeReponseUser'][$_SESSION['cpt'] + 1])) {
                            $reponseUtilisateur = $_SESSION['ListeReponseUser'][$_SESSION['cpt'] + 1];
                            $isChecked = $reponseUtilisateur[$cptReponse - 1] == '1';
                            $isCorrect = $isChecked && $reponse->correct == '1';
                        }
                        ?>
                        <label for="qst<?= $cptReponse ?>" <?php if ($reponse->correct == '1') {
                              echo 'id="question_correct"';
                          } ?><?php if ($isCorrect == '0') {
                               echo 'id="question_incorrect"';
                           } ?>>
                            <?= substr(htmlspecialchars($reponse->reponse), 3) ?>
                            <?php if ($isCorrect): ?>
                                <!-- Si la réponse est correcte -->
                                <input type="checkbox" name="qst<?= $cptReponse ?>" id="qst<?= $cptReponse ?>"
                                    value="<?= $reponse->correct ?>" disabled checked>
                                <span class="checkmark correct"><i class="fa-solid fa-check" style="color: #26c038"></i></span>
                            <?php elseif ($isChecked): ?>
                                <!-- Si la réponse est incorrecte -->
                                <input type="checkbox" name="qst<?= $cptReponse ?>" id="qst<?= $cptReponse ?>"
                                    value="<?= $reponse->correct ?>" disabled checked>
                                <span class="checkmark incorrect"><i class="fa-solid fa-x" style="color: #ff0000;"></i></span>
                            <?php else: ?>
                                <!-- Si la réponse n'a pas été sélectionnée -->
                                <input type="checkbox" name="qst<?= $cptReponse ?>" id="qst<?= $cptReponse ?>"
                                    value="<?= $reponse->correct ?>" disabled>
                            <?php endif; ?>
                        </label>
                        <?php $cptReponse++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="qcm-question-valider">
                    <input type="submit" name="submit_question" value="Suivant" id="valider_qcm_question">
                    <input type="hidden" id="timer-value" name="timer_value" value="">
                </div>
            </form>
            <?php
            // echo "<pre>" . "<br>" . "listeReponseUser :";
            // var_dump($_SESSION['ListeReponseUser']);
            // echo "<br>" . "listeReponseBD :";
            // var_dump($_SESSION['ListeReponseDB']);
            // echo "</pre>";
            ?>
        </div>
    </div>
</main>