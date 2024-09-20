document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const lightModeIcon = document.getElementById('lightModeIcon');
    const darkModeIcon = document.getElementById('darkModeIcon');

    // Ajouter un gestionnaire d'événements pour le clic sur le bouton de bascule
    lightModeIcon.addEventListener('click', function () {
        // Basculer vers le mode clair
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        lightModeIcon.classList.add('active');
        darkModeIcon.classList.remove('active');
    });

    darkModeIcon.addEventListener('click', function () {
        // Basculer vers le mode sombre
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        lightModeIcon.classList.remove('active');
        darkModeIcon.classList.add('active');
    });
});
