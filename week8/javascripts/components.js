$(document).ready(function() {

    // Mobile Button Carousel Scrolling
    {

        $('section.btn-carousel').on('wheel', function(event) {
            $(this).scrollLeft($(this).scrollLeft() - (event.originalEvent.deltaY * 30));
            event.preventDefault();
          });

    }

});