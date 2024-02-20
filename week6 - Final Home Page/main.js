$(document).ready(function() {
    let signToggler;
    let signToggled = false;

    $(".sign-toggler").click(function() {
        signToggler = $(this).find("span");
        signToggled = signToggler.text() == "<" ? true : false;

        if (signToggled) {
            $(this).find("span").text(">");
            signToggled = false;
            $(".horizontal-collapse").css({
                "transition" : "transform 0.5s ease, visibility 0.5s, opacity 0.5s",
                "tranform" : "translateX(100%)",
                "visibility" : "hidden",
                "opacity" : "0"
            });
        } else {
            $(this).find("span").text("<");
            $(".horizontal-collapse").css({
                "transition" : "transform 0.5s ease, visibility 0.5s, opacity 0.5s",
                "tranform" : "translateX(0%)",
                "visibility" : "visible",
                "opacity" : "1"
            });
            signToggled = true;
        }
    });

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

    $(".carousel-buttons a").hover(function() {
        $(this).find("img").css("filter", "brightness(0%)");
    }, function() {
        $(this).find("img").css("filter", "brightness(0%) invert(1)");
    });
    // Hover Mechanics

    // Card Size
    $(window).on("resize", function() {
        cardSize();
    });

    function cardSize() {
        if ($(window).width() >= 1980) {
            $(".pokemon").removeClass("col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3").addClass("col-2");
        }
        else {
            $(".pokemon").addClass("col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3").removeClass("col-2");
        }
    }
    // Card Size

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
    cardSize();
    // On Start
});