<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Correction</title>
    <link rel="stylesheet" href="../Content/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Correction</h1>
        <div id="correction"></div>
    </div>

    <script type="text/JavaScript" src="../Content/js/app.js"></script>
    <script type="text/JavaScript">

        function showCorrection() {
        var correctionDiv = document.getElementById('correction');
        var correctionHTML = "<h1>Correction</h1>";
        correctionHTML += "<ul>";
        
        for (var i = 0; i < quiz.questions.length; i++) {
            var question = quiz.questions[i];
            var userAnswer = quiz.userAnswers[i];
            var correctAnswer = question.answer;
            var isCorrect = userAnswer === correctAnswer;
            var listItem = "<li>";
            listItem += "<p><strong>Question: </strong>" + question.text + "</p>";
            listItem += "<p><strong>Your Answer: </strong>" + userAnswer + "</p>";
            listItem += "<p><strong>Correct Answer: </strong>" + correctAnswer + "</p>";
            listItem += "<p><strong>Result: </strong>" + (isCorrect ? "Correct" : "Incorrect") + "</p>";
            listItem += "</li>";
            
            correctionHTML += listItem;
        }
        
        correctionHTML += "</ul>";
        correctionDiv.innerHTML = correctionHTML;
        correctionDiv.style.display = "block";
    }
    </script>
</body>

</html>