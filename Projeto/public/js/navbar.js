const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});

document.addEventListener('DOMContentLoaded', function () {
    const userMenu = document.querySelector('.user-menu');

    if (userMenu) {
        userMenu.addEventListener('click', function (event) {
            event.stopPropagation();
            this.classList.toggle('active');
        });

        document.addEventListener('click', function (event) {
            if (!userMenu.contains(event.target)) {
                userMenu.classList.remove('active');
            }
        });
    }
});

