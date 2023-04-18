window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("app-container").classList.add('scrolled');
        document.getElementById("drop-header").classList.add('scrolled');
    } else {
        document.getElementById("app-container").classList.remove('scrolled');
        document.getElementById("drop-header").classList.remove('scrolled');
    }
}

function openMobileMenu() {
    $('.mobile-menu-nav').toggleClass('opened');
    $('body').toggleClass('opened-menu');
}

console.log(1);
