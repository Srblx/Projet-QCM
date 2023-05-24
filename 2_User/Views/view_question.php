<main id="question_qcm_main">
    <div class="compteur_question_qcm">
        <p>Question
            <?= $_GET['question'] ?>/20
        </p>
    </div>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <?php
            // Afficher la valeur de la question
            echo "<h3 class='titre_section_demarrage'>" . $questions[0]->question . "</h3>";
            ?>

            <form method="post"
                action="?controller=question_correction&action=question&id=<?= $_GET['id'] ?>&niveau=<?= $_GET['niveau'] ?>&question=<?= $_SESSION['question'] ?>">
                <div class="reponses-qcm">
                    <?php $cpt = 1 ?>
                    <?php foreach ($questions as $question): ?>
                        <label for="qst<?= $cpt ?>"><?= substr(htmlspecialchars($question->reponse), 3) ?>
                            <input type="checkbox" name="qst<?= $cpt ?>" id="qst<?= $cpt ?>">
                        </label>
                        <?php $cpt++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="qcm-question-valider">
                    <button type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</main>