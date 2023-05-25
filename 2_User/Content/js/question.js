document.addEventListener("DOMContentLoaded", function () {
  var questionMain = document.getElementById("question_qcm_main");
  if (questionMain) {
    const inputQuestion = document.querySelectorAll("input");
    const labelQuestion = document.querySelectorAll("label");

    document.querySelector("#form_qcm_jouer").addEventListener("submit", function (event) {
      let isAnyCheckboxChecked = false;

      inputQuestion.forEach(function (input) {
        if (input.type === "checkbox" && input.checked) {
          isAnyCheckboxChecked = true;
        }
      });

      if (!isAnyCheckboxChecked) {
        event.preventDefault();
        // Ajoutez ici le code que vous souhaitez exécuter lorsque aucune case à cocher n'est cochée
      }
    });

    inputQuestion.forEach((input, index) => {
      input.addEventListener("change", () => {
        if (input.checked) {
          // Agir sur le label correspondant
          labelQuestion[index].style.background = "#009cf9";
          labelQuestion[index].style.color = "#fff";
        } else {
          // Rétablir l'apparence normale du label
          labelQuestion[index].style.background = "#ff9fd8";
          labelQuestion[index].style.color = "#000";
        }
      });
    });
  }
});
