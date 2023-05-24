document.addEventListener("DOMContentLoaded", function () {
    var questionMain = document.getElementById("question_qcm_main");
    if (questionMain) {
        const inputQuestion = document.querySelectorAll('input');
        const labelQuestion = document.querySelectorAll('label');

        inputQuestion.forEach((input, index) => {
            input.addEventListener('change', () => {
                if (input.checked) {
                    // Agir sur le label correspondant
                    labelQuestion[index].style.background = '#009cf9';
                    labelQuestion[index].style.color = '#fff';
                } else {
                    // Rétablir l'apparence normale du label
                    labelQuestion[index].style.background = '#ff9fd8';
                    labelQuestion[index].style.color = '#000';
                }
            });
        });
    }
});