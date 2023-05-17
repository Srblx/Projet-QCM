/* Script exécuté uniquement sur la page About  */

document.addEventListener("DOMContentLoaded", function () {
  var aboutMain = document.getElementById("about_main");
  if (aboutMain) {
    var questionHeaders = aboutMain.querySelectorAll(".about_question-header");

    questionHeaders.forEach(function (header) {
      header.addEventListener("click", function () {
        var question = this.parentElement;
        var about_answer = this.nextElementSibling;

        question.classList.toggle("active");
        if (question.classList.contains("active")) {
          about_answer.style.maxHeight = about_answer.scrollHeight + "px";
        } else {
          about_answer.style.maxHeight = "0";
        }
      });
    });
  }
});

function Quiz(questions) {
  this.score = 0;
  this.questions = questions;
  this.questionIndex = 0;
  this.userAnswers = []; // Tableau pour stocker les réponses de l'utilisateur
}

Quiz.prototype.getQuestionIndex = function () {
  return this.questions[this.questionIndex];
};

Quiz.prototype.isEnded = function () {
  return this.questions.length === this.questionIndex;
};

Quiz.prototype.guess = function (answer) {
  if (this.getQuestionIndex().correctAnswer(answer)) {
    this.score++;
  }
  this.userAnswers.push(answer); // Stockage de la réponse de l'utilisateur
  this.questionIndex++;
};

function Question(text, choices, answer) {
  this.text = text;
  this.choices = choices;
  this.answer = answer;
}

Question.prototype.correctAnswer = function (choice) {
  return choice === this.answer;
};

function populate() {
  if (quiz.isEnded()) {
    showScores();
  } else {
    var element = document.getElementById("question");
    element.innerHTML = quiz.getQuestionIndex().text;

    // Afficher les choix
    var choices = quiz.getQuestionIndex().choices;
    for (var i = 0; i < choices.length; i++) {
      var element = document.getElementById("choice" + i);
      element.innerHTML = choices[i];

      guess("btn" + i, choices[i]);
    }

    showProgress();
  }
}

function guess(id, guess) {
  var button = document.getElementById(id);
  button.onclick = function () {
    quiz.guess(guess);
    populate();
  };
}

function showProgress() {
  var currentQuestionNumber = quiz.questionIndex + 1;
  var element = document.getElementById("progress");
  element.innerHTML = "Questions " + currentQuestionNumber + " of " + quiz.questions.length;
}

function showScores() {
  var gameOverHTML = "<h1 id='result_quiz'>Resultats</h1>";
  gameOverHTML += "<h2 id='score'> Votre Score: " + quiz.score + "</h2>";
  // gameOverHTML += "<button id='showCorrectionBtn'>Correction</button>";
  // gameOverHTML += "<button id='showLeaderboardBtn'>Tableau des Scores</button>";
  var element = document.getElementById("quiz");
  element.innerHTML = gameOverHTML;
  // var showCorrectionBtn = document.getElementById('showCorrectionBtn');
  // showCorrectionBtn.addEventListener('click', showCorrection); // Ajout de l'écouteur d'événement pour afficher la correction
}

function showCorrection() {
  // Code pour afficher la correction du quiz
}

// Appel de la fonction showCorrection() lors du chargement de la page
window.addEventListener("load", showCorrection);

var questions = [
  new Question(
    "Quelle propriété CSS permet de spécifier la couleur de fond d'un élément ?",
    ["background-color", "color", "font-color", "text-color"],
    "background-color"
  ),
  new Question(
    "Quel est le sélecteur CSS qui cible tous les éléments ?",
    ["*", "all", "every", "any"],
    "*"
  ),
];

var quiz = new Quiz(questions);

populate();
