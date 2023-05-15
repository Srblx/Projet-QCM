<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Quiz ByteMaster</title>
    <link rel="stylesheet" href="../Content/css/style.css">
</head>

<body>
    <button type='button' onclick='location.reload()'>Reload</button> <!-- Bouton pour recharger la page -->
    <div class="container">
        <h1>Quiz ByteMaster</h1> <!-- Titre du quiz -->
        <div id="quiz">
            <hr style="margin-bottom: 20px">
            <p id="question"></p> <!-- Emplacement pour afficher la question -->

            <div class="button-grp">
                <button id="btn0"><span id="choice0"></span></button> <!-- Bouton de choix 1 -->
                <button id="btn1"><span id="choice1"></span></button> <!-- Bouton de choix 2 -->
                <button id="btn2"><span id="choice2"></span></button> <!-- Bouton de choix 3 -->
                <button id="btn3"><span id="choice3"></span></button> <!-- Bouton de choix 4 -->
            </div>

            <hr style="margin-top: 50px">

            <footer>
                <p id="progress">Question x of y</p> <!-- Emplacement pour afficher la progression du quiz -->
            </footer>
            <!-- <button id="showCorrectionBtn" class="result-button" style="display: none;" onclick="redirectToCorrection()"></button> Bouton pour afficher la correction (caché par défaut) -->
        </div>
    </div>

    <script type="text/JavaScript" src="../Content/js/app.js"></script> <!-- Lien vers le fichier JavaScript -->
    <script type="text/JavaScript">
        function redirectToCorrection() {
            window.location.replace("./view_correction.php"); // Redirection vers la page de correction
        }
            function redirectToLeaderboard() {
            window.location.replace("./view_leaderboard.php");
        }
    </script>
</body>

</html>