$(document).ready(function() {
    // Hover Mechanics
    $("button.navbar-toggler, button#search-button").hover(function() {
        $(this).find("i").removeClass("text-light").addClass("text-dark");
    }, function() {
        $(this).find("i").removeClass("text-dark").addClass("text-light");
    });

    $("div#navbarLogo").hover(function() {
        $(this).find("h1").removeClass("text-light").addClass("text-dark");
    }, function() {
        $(this).find("h1").removeClass("text-dark").addClass("text-light");
    });

    $(".carousel-buttons button").hover(function() {
        $(this).find("img").css("filter", "brightness(0%)");
    }, function() {
        $(this).find("img").css("filter", "brightness(0%) invert(1)");
    });
    // Hover Mechanics

    // Like Mechanics
    let likeButton;
    let liked = false;

    $(".card button").click(function() {
        likeButton = $(this).find("i");
        liked = likeButton.hasClass("bi-suit-heart-fill") ? true : false;

        if (liked) {
            likeButton.addClass("bi-suit-heart");
            likeButton.removeClass("bi-suit-heart-fill");
            liked = false;
        } else {
            likeButton.removeClass("bi-suit-heart");
            likeButton.addClass("bi-suit-heart-fill");
            liked = true;
        }
    });
    // Like Mechanics

    // Side Toggle Mechanics
    const side = document.querySelector('#side');
    const sideToggler = document.querySelector('#side-toggler');
    const sideTogglerIcon = document.querySelector('#side-toggler-icon');

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
            if(!sideTogglerIcon.classList.contains("bi-box-arrow-in-down-left")) {
                sideTogglerIcon.classList.remove("bi-box-arrow-up-right");
                sideTogglerIcon.classList.add("bi-box-arrow-in-down-left");
            }
        }
        else {
            if(!sideTogglerIcon.classList.contains("bi-box-arrow-up-right")) {
                sideTogglerIcon.classList.remove("bi-box-arrow-in-down-left");
                sideTogglerIcon.classList.add("bi-box-arrow-up-right");
            }
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
    // Side Toggle Mechanics

    // Mobile Buttons Scrolling
    const carouselButtons = document.querySelector('.carousel-buttons');
    const arrowButtons = document.querySelectorAll('.btn-arrow');

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

    // On Start
    toggler();
    // On Start
});