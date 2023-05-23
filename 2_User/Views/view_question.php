<main>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <main>
                <?php
                if ($questions) {
                    $counter = 0;
                    foreach ($questions as $question) {
                        $counter++;
                        echo "<h3 class='titre_section_demarrage'>" . $question->question . "</h3>";
                        echo "<ul>";

                        // Autres instructions à l'intérieur de la boucle
                
                        if ($counter === 1) {
                            break; // Arrête la boucle lorsque le compteur est égal à 1
                        }
                    }

                }
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