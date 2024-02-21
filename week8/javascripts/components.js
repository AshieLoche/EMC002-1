$(document).ready(function() {

    // Side Toggle Mechanics
    {
        const sideNav = $('#side-nav');
        const sideNavToggler = $('#side-nav-toggler');
        const sideNavTogglerIcon = $('#side-nav-toggler-icon');

        $(sideNavToggler).click(function() {
            sideNavToggle();
        });

        function sideNavToggle() {
            if (sideNav.get(0).classList.contains('side-nav-expanded')) {
                sideNav.removeClass('side-nav-expanded').addClass('side-nav-shrunk');

                if (sideNavTogglerIcon.get(0).classList.contains("bi-box-arrow-in-down-left")) {
                    sideNavTogglerIcon.removeClass('bi-box-arrow-in-down-left').addClass('bi-box-arrow-up-right');

                }
            } else {
                sideNav.removeClass('side-nav-shrunk').addClass('side-nav-expanded');

                if (sideNavTogglerIcon.get(0).classList.contains("bi-box-arrow-up-right")) {
                    sideNavTogglerIcon.removeClass('bi-box-arrow-up-right').addClass('bi-box-arrow-in-down-left');

                }
            }
        }

        $(window).on('resize', function(){
            if ($(window).width() < 768 && sideNav.get(0).classList.contains('side-nav-shrunk') && sideNavTogglerIcon.get(0).classList.contains("bi-box-arrow-up-right")) {
                sideNav.removeClass('side-nav-shrunk').addClass('side-nav-expanded');
                sideNavTogglerIcon.removeClass('bi-box-arrow-up-right').addClass('bi-box-arrow-in-down-left');
            }
        });
    }
    // Side Toggle Mechanics

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

    // Horizontal Button Carousel Scrolling (< MD)
    {

        $('section.btn-carousel').on('wheel', function(event) {
            $(this).scrollLeft($(this).scrollLeft() - (event.originalEvent.deltaY * 30));
            event.preventDefault();
        });

    }
    // Horizontal Button Carousel Scrolling (< MD)

});