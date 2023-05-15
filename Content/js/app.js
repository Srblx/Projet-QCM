
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
