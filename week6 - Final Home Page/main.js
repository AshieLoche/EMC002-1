$(document).ready(function(){
    // Hover Mechanics
    $("button.navbar-toggler, button#search-button").hover(function(){
        $(this).find("i").removeClass("text-light").addClass("text-dark");
    }, function(){
        $(this).find("i").removeClass("text-dark").addClass("text-light");
    });

    $("div#navbarLogo").hover(function(){
        $(this).find("h1").removeClass("text-light").addClass("text-dark");
        $(this).find("img").css("filter", "brightness(100%) contrast(120%)");
    }, function(){
        $(this).find("h1").removeClass("text-dark").addClass("text-light");
        $(this).find("img").css("filter", "none");
    });

    $("div.side button").hover(function(){
        $(this).find("img").css("filter", "brightness(0%)");
    }, function(){
        $(this).find("img").css("filter", "brightness(0%) invert(1)");
    });
    // Hover Mechanics

    // Side Toggle Mechanic
    const sideToggler = document.querySelector('#side-toggler');
    const side = document.querySelector('#side');
    const expandIcon = document.querySelector('#expand-icon');
    const shrinkIcon = document.querySelector('#shrink-icon');

    toggler();

    $(sideToggler).click(function() {
        if (side.classList.contains("side-expanded")) {
            side.classList.remove("side-expanded");
            side.classList.add("side-shrunk");
            toggler();
        }
        else {
            side.classList.remove("side-shrunk");
            side.classList.add("side-expanded");
            toggler();
        }
    });

    function toggler() {
        if (side.classList.contains("side-expanded")) {
            expandIcon.classList.add("d-none");
            shrinkIcon.classList.remove("d-none");
        }
        else {
            shrinkIcon.classList.add("d-none");
            expandIcon.classList.remove("d-none");
        }
    }

    $(window).on("resize", function() {
        if ($(window).width() < 768) {
            if (side.classList.contains("side-shrunk")) {
                side.classList.remove("side-shrunk");
                side.classList.add("side-expanded");
            }
        }
    });
    // Side Toggle Mechanic

    // Mobile Buttons Scrolling
    const carouselButtons = document.querySelector('.carousel-buttons');
    const arrowButtons = document.querySelectorAll('.btn-arrow');

    // Add click event listeners to the arrow buttons
    arrowButtons.forEach(button => {
        button.addEventListener('click', () => {
            const direction = button.dataset.direction;
            const scrollAmount = direction === 'right' ? carouselButtons.scrollWidth - carouselButtons.clientWidth : -(carouselButtons.scrollLeft - carouselButtons.clientWidth);
            carouselButtons.scrollTo({
                left: carouselButtons.scrollLeft + scrollAmount,
                behavior: 'smooth'
            });
        })
    });
    // Mobile Buttons Scrolling
});