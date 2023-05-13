<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="../Content/css/style.css">
</head>

<body>
    <div class="leaderboard-container">
        <h1 class="leaderboard-title">Résultat final</h1>
        <h3 id="result-title">Vous avez obtenu X bonnes réponses</h3>

        <div id="leaderboard">

            <table class="leaderboard-table">

                <h2 class="leaderboard-title">Classement final</h2>
                <hr>
                <tr>
                    <th>TOP</th>
                    <th>SCORE</th>
                    <th>TIME</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Score 1</td>
                    <td>Time 1</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Score 2</td>
                    <td>Time 2</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Score 3</td>
                    <td>Time 3</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Score 4</td>
                    <td>Time 4</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Score 5</td>
                    <td>Time 5</td>
                </tr>
                <tr>
                    <td>Your Rank</td>
                    <td>Your Score</td>
                    <td>Your Time</td>
                </tr>
            </table>

            <button id="view-correction-btn" class="result-button center-button" onclick="redirectToCorrection()">Voir la correction</button>
        </div>
    </div>

    <script type="text/JavaScript" src="../Content/js/app.js"></script>
    <script type="text/JavaScript">
        function redirectToCorrection() {
            window.location.replace("./view_correction.php");
        }
    </script>
</body>

</html>