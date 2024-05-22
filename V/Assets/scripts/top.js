window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    var backToTopBtn = document.getElementById("backToTopBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopBtn.style.display = "block";
        backToTopBtn.classList.add("hover"); // Ajoute la classe de survol
    } else {
        backToTopBtn.style.display = "none";
        backToTopBtn.classList.remove("hover"); // Supprime la classe de survol
    }
}

function topFunction() {
    document.body.scrollTop = 0; // Pour Safari
    document.documentElement.scrollTop = 0; // Pour Chrome, Firefox, IE et Opera
}