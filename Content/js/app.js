const questions = document.querySelectorAll(".about-question");

questions.forEach((question) => {
  question.addEventListener("click", () => {
    const answer = question.nextElementSibling;
    answer.style.display = answer.style.display === "none" ? "block" : "none";
  });
});
