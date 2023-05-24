<main>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <main>
                <?php

                // Afficher la valeur de la question
                echo "<h3 class='titre_section_demarrage'>" . $questions[0]->question . "</h3>";
                ?>
                <form action="">
                    <?php $cpt = 1 ?>
                    <?php foreach ($questions as $question): ?>
                        <label for="qst<?= $cpt ?>"><?= $question->description ?></label>
                        <input type="checkbox" name="qst<?= $cpt ?>" id="qst<?= $cpt ?>"><br />
                        <?php $cpt++ ?>
                    <?php endforeach; ?>
                    <button type="submit">Valider</button>
                </form>
        </div>
    </div>
</main>