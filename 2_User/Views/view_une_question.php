<?php
// echo "<pre>";
// var_dump($_SESSION['data']);
/* echo $_SESSION['theme'];
echo $_SESSION['niveau']; */
// echo "</pre>";
?>
<main id="question_qcm_main">
    <div class="infos_question_qcm">
        <div class="compteur_question_qcm">
            <p>Question
                <?= $_SESSION['cpt'] + 1 ?>/20
            </p>
        </div>
        <div class="timer">
            <p id="question-qcm-timer">
                45
            </p>
        </div>
    </div>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <?php
            // Afficher la valeur de la question
            echo "<h3 class='titre_section_demarrage'>" . $question->question . "</h3>";
            ?>

            <form id="form_qcm_jouer" method="post" action="?controller=question_correction&action=question_suivante">
                <div class="reponses-qcm">
                    <?php $cptReponse = 1 ?>
                    <?php $ReponseDB = ""; ?>

                    <?php foreach ($reponses as $reponse): ?>
                        <label for="qst<?= $cptReponse ?>"><?= substr(htmlspecialchars($reponse->reponse), 3) ?>
                            <input type="checkbox" name="qst<?= $cptReponse ?>" id="qst<?= $cptReponse ?>"
                                value="<?= $reponse->correct ?>">
                            <?php $ReponseDB .= $reponse->correct; ?>
                        </label>
                        <?php $cptReponse++ ?>
                    <?php endforeach; ?>
                    <?php /*  //echo $ReponseDB;  */?>
                    <?php $cpt = $_SESSION['cpt']; ?>
                    <?php $ListeReponseDB = $_SESSION['ListeReponseDB']; ?>
                    <?php $ListeReponseDB[$cpt] = $ReponseDB;
                    $_SESSION['ListeReponseDB'] = $ListeReponseDB; ?>

                </div>
                <div class="qcm-question-valider">
                    <input type="submit" name="submit_question" value="Valider" id="valider_qcm_question">
                    <input type="hidden" id="timer-value" name="timer_value" value="">
                </div>
            </form>
            <?php
            /*             echo "<pre>" . "<br>" . "listeReponseUser :";
                        var_dump($_SESSION['ListeReponseUser']);
                        echo "<br>" . "listeReponseBD :";
                        var_dump($_SESSION['ListeReponseDB']);
                        echo "</pre>"; */
            ?>
            <?php
            /* "<br> score : " . $_SESSION['score']; */
            ?>
            </span>
        </div>
    </div>
</main>