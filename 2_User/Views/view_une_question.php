<?php
// echo "<pre>";
// var_dump($_SESSION['data']);
// echo "</pre>";
?>
<main id="question_qcm_main">
    <div class="infos_question_qcm">
        <div class="compteur_question_qcm">
            <p>Question
                <?= $_SESSION['cpt'] ?>/20
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
                    <?php $cpt = 1 ?>
                    <?php foreach ($reponses as $reponse) : ?>
                        <label for="qst<?= $cpt ?>"><?= substr(htmlspecialchars($reponse->reponse), 3) ?>
                            <input type="checkbox" name="qst<?= $cpt ?>" id="qst<?= $cpt ?>" value="<?= $reponse->correct ?>">
                        </label>
                        <?php $cpt++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="qcm-question-valider">
                    <input type="submit" name="submit_question" value="Valider" id="valider_qcm_question">
                    <input type="hidden" id="timer-value" name="timer_value" value="">
                </div>
            </form>
            <?php
            $reponseUtilisateur = $_SESSION["reponseUtilisateur"];
            echo $reponseUtilisateur . "<br/>";
            if (isset($_SESSION['timer'])) {
                echo $_SESSION['timer'];
            }
            ?>

        </div>
    </div>
</main>