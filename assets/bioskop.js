var headerClicked = 0;

window.addEventListener('scroll', function() {
    var navbar = document.getElementById('header');
    if (window.scrollY > 0) {
        navbar.classList.add('header-scrolled', 'shadow');
    } else if (window.scrollY == 0 && !headerClicked % 2 == 1) {
        navbar.classList.remove('header-scrolled', 'shadow');
        navbar.classList.add('header-top', 'navbar-dark');
    }
});

function headerbg() {
    var navbar = document.getElementById('header');
    headerClicked ++;
    if (headerClicked % 2 == 1) {
        navbar.classList.add('header-scrolled', 'shadow');
    } else if (headerClicked % 2 == 0 && !window.scrollY > 0) {
        navbar.classList.remove('header-scrolled', 'shadow');
    }
}

window.addEventListener('scroll', reveal);

function reveal() {
    var reveals = document.querySelectorAll('.reveal');

    for (var i=0; i<reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var revealTop = reveals[i].getBoundingClientRect().top;
        var revealPoint = 50;

        if (revealTop < windowHeight - revealPoint) {
            reveals[i].classList.add('active');
        } else {
            reveals[i].classList.remove('active');
        }
    }
}

var btnClicked = 0;
function toggleText() {
    var btn = document.getElementById('more-btn');
    var textElement = document.getElementById('sinopsis');
    btnClicked ++;
    if (btnClicked % 2 == 1) {
        btn.innerHTML = 'Hide';
    } else {
        btn.innerHTML = 'See more...';
    }
    textElement.classList.toggle('expanded');
}
  