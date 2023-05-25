<?php
// echo "<pre>";
// var_dump($_SESSION['data']);
// echo "</pre>";
?>
<main id="question_qcm_main">
    <div class="compteur_question_qcm">
        <p>Question
            <?= $_SESSION['cpt'] ?>/20
        </p>
    </div>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <?php
            // Afficher la valeur de la question
            echo "<h3 class='titre_section_demarrage'>" . $question->question . "</h3>";
            ?>

            <form id="form_qcm_jouer" method="post" action="?controller=question_correction&action=une_question">
                <div class="reponses-qcm">
                    <?php $cpt = 1 ?>
                    <?php foreach ($reponses as $reponse): ?>
                        <label for="qst<?= $cpt ?>"><?= substr(htmlspecialchars($reponse->reponse), 3) ?>
                            <input type="checkbox" name="qst<?= $cpt ?>" id="qst<?= $cpt ?>">
                        </label>
                        <?php $cpt++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="qcm-question-valider">
                    <input type="submit" name="submit" value="Valider" id="valider_qcm_question">
                </div>
            </form>
            <?php echo $_POST['submit'] ?>
        </div>
    </div>
</main>