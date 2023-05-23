<main id="leaderboard_main">
    <div class="leaderboard-container">
        <h1 class="leaderboard-title">Classement global</h1>

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

            </table>
        </div>
    </div>

    <script type="text/JavaScript" src="../Content/js/app.js" defer></script>
</main>