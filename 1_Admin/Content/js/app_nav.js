// Attend que le DOM soit chargé
document.addEventListener('DOMContentLoaded', () => {
    // Sélectionne le toggle et la navigation
    const toggle = document.querySelector('.navbar-toggler');
    const navigation = document.querySelector('.navbar-collapse');
  
    // Ajoute un écouteur d'événement au clic sur le toggle
    toggle.addEventListener('click', () => {
      // Bascule la classe 'show' pour afficher ou masquer la navigation
      navigation.classList.toggle('show');
    });
  });