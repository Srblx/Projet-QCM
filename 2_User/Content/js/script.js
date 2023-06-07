document.addEventListener("DOMContentLoaded", function () {
  var homeMain = document.getElementById("home-main");
  if (homeMain) {
    document.getElementById("home-btn-jouer").addEventListener("click", function () {
      window.location.href = "?controller=choice&action=choice";
    });
  }
});

