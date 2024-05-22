// Lorsque l'utilisateur fait défiler vers le bas de 20 pixels à partir du haut du document, affichez le bouton
window.onscroll = function() {
    scrollFunction();
  };
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("backToTopBtn").style.display = "block";
    } else {
      document.getElementById("backToTopBtn").style.display = "none";
    }
  }
  
  // Lorsque l'utilisateur clique sur le bouton, faites défiler vers le haut du document
  function topFunction() {
    document.body.scrollTop = 0; // Pour Safari
    document.documentElement.scrollTop = 0; // Pour Chrome, Firefox, IE et Opera
  }