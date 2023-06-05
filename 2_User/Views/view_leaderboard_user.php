<?php
if (!isset($_SESSION['theme']) || !isset($_SESSION['niveau'])) {
    header("Location: ?controller=home&action=home");
}
?>

<main>
    <div class="leaderboard-container">
        <h1 class="leaderboard-title">Résultat final</h1>
        <h3 id="result-title">Vous avez obtenu
            <?= $quizz_user->scores ?> bonnes réponses
        </h3>

        <div id="leaderboard">

            <table class="leaderboard-table">
                <hr>
                <tr>
                    <th>TOP</th>
                    <th>SCORE</th>
                    <th>THEME</th>
                    <th>NIVEAU</th>
                    <th>TEMPS</th>
                </tr>
                <?php $cpt = 1; ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?= "#" . $cpt . " " . $user->pseudo ?>
                        </td>
                        <td>
                            <?= $user->scores ?>
                        </td>
                        <td>
                            <?= $user->nom_theme ?>
                        </td>
                        <td>
                            <?= ucfirst($user->niveau) ?>
                        </td>
                        <td>
                            <?= $user->temps ?>
                        </td>
                    </tr>
                    <?php $cpt++; ?>
                <?php endforeach; ?>
                <tr class="result_leaderbord_user">
                    <td>
                        <?= $quizz_user->pseudo ?>
                    </td>
                    <td>
                        <?= $quizz_user->scores ?>
                    </td>
                    <td>
                        <?= $quizz_user->nom_theme ?>
                    </td>
                    <td>
                        <?= ucfirst($quizz_user->niveau) ?>
                    </td>
                    <td>
                        <?= $quizz_user->temps ?>
                    </td>
                </tr>
            </table>
            <div id="leaderboard_user_buttons">
                <a href="?controller=question_correction&action=correction" id="view-correction-btn"
                    class="result-button center-button">Voir la correction
                </a>
                <a href="?controller=home&action=home" id="view-correction-btn"
                    class="result-button center-button">Retour à
                    l'accueil
                </a>
                <a href="?controller=choice&action=choice" id="view-correction-btn"
                    class="result-button center-button">Rejouer
                </a>
            </div>
        </div>
    </div>
</main>