const blogImages = document.querySelectorAll('.ul-blogs img');

blogImages.forEach(image => {
  image.addEventListener('click', () => {
    // Pour agrandir l'image
    // pour que la transition soit graduelle
    // ces classes ont etés mises dans le css
    // le toggle sert a activer si l'event n'est pas présent, et le desactiver si il est deja présent
    image.classList.toggle("zoom")

    
  });
});

