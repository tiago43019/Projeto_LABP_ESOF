<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://kit.fontawesome.com/f733acf00f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/js/smooth-scroll.js"></script>
<script> //favoritoss
        function toggleFavorito(btn) {
            btn.classList.toggle('favorito');
            btn.textContent = btn.classList.contains('favorito') ? 'Remover dos Favoritos' : 'Adicionar aos Favoritos';
        }
</script>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('explorarBtn').addEventListener('click', function(e) {
        e.preventDefault();

        const isAdmin = document.querySelector('.criar-atividade') !== null;
        const destination = isAdmin ? '/adminhome#gallery' : '/home#gallery';
        const galleryElement = document.getElementById('gallery');

        if (galleryElement) {
            galleryElement.scrollIntoView({
                behavior: 'smooth'
            });
        } else {
            window.location.href = destination;
        }
    });
});
</script>