document.addEventListener("DOMContentLoaded", function () {
  let homeMain = document.getElementById("home-main");
  if (homeMain && !localStorage.getItem("siteLaunched")) {
    alert(
      "Ce site est en cours de développement, si vous rencontrez des bugs n'hésitez pas à nous en faire part dans l'onglet Contact"
    );
    localStorage.setItem("siteLaunched", true);
  }
});
