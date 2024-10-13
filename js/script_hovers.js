
const userIcon = document.getElementById('userIcon');
const menu = document.getElementById('menu');

// Montrer le menu au survol
userIcon.addEventListener('mouseover', () => {
    menu.style.display = 'block';
});


// TROUVER LA METHODE POUR GARDER LE MENU ACTIVER LORSQUE JE PASSE DE L'ICON AU MENU************
// Cacher le menu lorsque la souris quitte l'icône ou le menu
userIcon.addEventListener('mouseleave', () => {
    setTimeout(() => {
        menu.style.display = 'none';
    }, 3500); // Délai avant de masquer le menu
});

menu.addEventListener('mouseenter', () => {
    menu.style.display = 'block';
});

menu.addEventListener('mouseleave', () => {
    menu.style.display = 'none';
});
