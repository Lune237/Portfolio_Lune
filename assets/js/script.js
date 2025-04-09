function toggleTheme() {
    const body = document.body;
    const button = document.getElementById('theme-toggle');

    // Vérifier si le mode sombre est déjà activé
    if (body.classList.contains('mode-sombre')) {
        // Passer en mode clair
        body.classList.remove('mode-sombre');
        button.textContent = "Passer en mode sombre"; // Change le texte du bouton
    } else {
        // Passer en mode sombre
        body.classList.add('mode-sombre');
        button.textContent = "Passer en mode clair"; // Change le texte du bouton
    }
}
