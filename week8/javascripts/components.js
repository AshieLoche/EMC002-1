$(document).ready(function() {

    // Heart Mechanics
    let heartIcon;
    let hearted = false;

    $("button#heart").click(function() {
        heartIcon = $(this).find("i");
        hearted = heartIcon.hasClass("bi-suit-heart-fill") ? true : false;

        if (hearted) {
            heartIcon.addClass("bi-suit-heart").removeClass("bi-suit-heart-fill");
            hearted = false;
        } else {
            heartIcon.removeClass("bi-suit-heart").addClass("bi-suit-heart-fill");
            hearted = true;
        }
    });
    // Heart Mechanics

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

    // Horizontal Button Carousel Scrolling (< MD)
    {

        $(window).on('resize', function() {
            scrolling();
        });
        
        scrolling();

        function scrolling() {
            if ($('.btn-carousel').outerHeight() < $('body').outerHeight()) {
                $('section.btn-carousel').on('wheel', function(event) {
                    $(this).scrollLeft($(this).scrollLeft() + (event.originalEvent.deltaY * 60));
                    event.preventDefault();
                });
            } else {
                $('section.btn-carousel').off('wheel');
            }
        }

    }
    // Horizontal Button Carousel Scrolling (< MD)

    // Modal Transfer
    let signToggler;
    let signToggled = false;

    $(".sign-toggler").click(function() {
        signToggler = $(this).find("span");
        signToggled = signToggler.text() == "<" ? true : false;

        if (signToggled) {
            signToggler.text(">");
            $(this).parent().parent().find('button.modal-switch').fadeOut('fast', 'swing');
            signToggled = false;
        } else {
            signToggler.text("<");
            $(this).parent().parent().find('button.modal-switch').fadeIn('fast', 'swing');
            signToggled = true;
        }
    });
    // Modal Transfer

});