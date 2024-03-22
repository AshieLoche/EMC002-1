$(document).ready(function() {

    searchResult = '';
    const selectedTypes = [];
    const selectedSpecies = [];
    const filteredPokemonCards = {};

    $("#search_bar").on("input", function() {
        searchResult = $(this).val().toLowerCase().trim();
        const pokemonCards = $('.pokemon_card');
        pokemonCards.hide();
        
        filter(pokemonCards);

    });
    
    $("button.type").click(function() {
        const value = $(this).val().toLowerCase();
        const typeFiltered = $(this).hasClass('btn-light');
        const pokemonCards = $('.pokemon_card');
        pokemonCards.hide();
      
        if (typeFiltered) {
          // Remove value from selectedTypes if previously selected
          selectedTypes.splice(selectedTypes.indexOf(value), 1);
          $(this).removeClass("btn-light").addClass("btn-outline-light");
        } else {
          // Add value to selectedTypes if newly selected
          selectedTypes.push(value);
          $(this).removeClass("btn-outline-light").addClass("btn-light");
        }

        filter(pokemonCards);

    });

    $("button.speciesSingular").click(function() {
        const value = $(this).val().toLowerCase();
        const speciesFiltered = $(this).hasClass('btn-light');
        const pokemonCards = $('.pokemon_card');
        pokemonCards.hide();
      
        if (speciesFiltered) {
            // Remove value from selectedSpecies if previously selected
            selectedSpecies.splice(selectedSpecies.indexOf(value), 1);
            $(this).removeClass("btn-light").addClass("btn-outline-light");
        } else {
            // Add value to selectedSpecies if newly selected
            selectedSpecies.push(value);
            $(this).removeClass("btn-outline-light").addClass("btn-light");
        }

        filter(pokemonCards);

    });

    function filter(pokemonCards) {
        
        if (selectedTypes.length > 0) {
            if (pokemonCards.length > 0) {
                for (let currentIndex = 0; currentIndex < pokemonCards.length; currentIndex++) {
                    const cardType = pokemonCards.eq(currentIndex).find('.types').text().toLowerCase();
                    // alert(cardType);
                    selectedTypes.forEach(type => {
                        if (cardType.indexOf(type) > -1) {
                            filteredPokemonCards[currentIndex] = pokemonCards.eq(currentIndex);
                            pokemonCards.eq(currentIndex).show();
                        } else {
                            delete filteredPokemonCards[currentIndex];
                        }
                    });
                }
            } else {
              console.log("No Pokemon cards found.");
            }
        }
        
        if (selectedSpecies.length > 0 && searchResult.length == 0) {
            if (pokemonCards.length > 0) {
                for (let currentIndex = 0; currentIndex < pokemonCards.length; currentIndex++) {
                    const cardSpecies = pokemonCards.eq(currentIndex).find('.species').text().toLowerCase();
                    selectedSpecies.forEach(species => {
                        if (cardSpecies.indexOf(species) > -1) {
                            filteredPokemonCards[currentIndex] = pokemonCards.eq(currentIndex);
                            pokemonCards.eq(currentIndex).show();
                        } else {
                            delete filteredPokemonCards[currentIndex];
                        }
                    });
                }
            } else {
              console.log("No Pokemon cards found.");
            }
        }

        // if (searchResult.length > 0 ||selectedSpecies.length > 0 || selectedTypes.length > 0) {

        //     // alert(Object.keys(filteredPokemonCards).length);

        //     if (selectedSpecies.length == 0 && selectedTypes.length == 0) {
        //         for (const key in filteredPokemonCards) {
        //             delete filteredPokemonCards[key];
        //         }

        //     }

        //     if (Object.keys(filteredPokemonCards).length > 0) {
        //         // alert('owo');
        //         for (const key in filteredPokemonCards) {
        //             const filteredPokemonCard = filteredPokemonCards[key];

        //             const cardName = filteredPokemonCard.find('.pokemon_name').text().toLowerCase().trim();
        //             if (cardName.indexOf(searchResult) > -1) {
        //                 filteredPokemonCards[currentIndex] = pokemonCards.eq(currentIndex);
        //                 filteredPokemonCard.show();
        //             } else {
        //                 delete filteredPokemonCards[currentIndex];
        //             }
        //         }
        //     } else if (pokemonCards.length > 0) {
        //         // alert('uwu');
        //         for (let currentIndex = 0; currentIndex < pokemonCards.length; currentIndex++) {
        //             const cardName = pokemonCards.eq(currentIndex).find('.pokemon_name').text().toLowerCase();
        //             if (cardName.indexOf(searchResult) > -1) {
        //                 pokemonCards.eq(currentIndex).show();
        //             }
        //         }
        //     } else {
        //       console.log("No Pokemon cards found.");
        //     }
                    
        // }

        if (selectedSpecies.length == 0 && selectedTypes.length == 0 && searchResult.length == 0) {
            $('.pokemon_card').show();
            for (const key in filteredPokemonCards) {
                delete filteredPokemonCards[key];
            }
        }
        
    }

    function filter(pokemonCards) {
        // Combined type/species filtering
        const filteredByTypesAndSpecies = pokemonCards.filter(card => {
          const cardType = card.find('.types').text().toLowerCase();
          const cardSpecies = card.find('.species').text().toLowerCase();
      
          return selectedTypes.some(type => cardType.includes(type)) ||
                 selectedSpecies.some(species => cardSpecies.includes(species));
        });
      
        // Card name filtering based on visible cards
        const filteredCards = filteredByTypesAndSpecies.filter(card => {
          // Consider card visible only if it's not hidden
          // Adjust condition if using a different visibility approach
          const isVisible = card.is(':visible');
      
          if (isVisible) {
            const cardName = card.find('.pokemon_name').text().toLowerCase();
            return searchResult.length === 0 || cardName.includes(searchResult);
          }
      
          return false; // Hide card if not visible and there's a search term
        });
      
        // Show filtered cards and hide others
        pokemonCards.hide();
        filteredCards.show();
      }
      

    // Sign Up Requirements
    {

        let password = '';
        let complete = false;
        const reqs = {
            'username': false,
            'password': false,
            'confirm_password': false,
            'mobile': false
        }

        function reqCheck() {

            for (const key in reqs) {
                if (!reqs[key]) {
                    complete = false;
                    break;
                } else {
                    complete = true;
                    continue;
                }
            }

            (complete) ? $("#signUp_submit").prop("disabled", false) : $("#signUp_submit").prop("disabled", true);

        }

        reqCheck();
        
        $('#username').click(function() {
            $('#uname_reqs').removeClass('d-none');
        });

        $('#username').on('input', function() {
            let username = $(this).val().trim();
            let usernamePattern = /^\w{6,20}$/;

            (/^.{6,20}$/.test(username)) ? $("#uname_len").addClass('text-light') : $("#uname_len").removeClass('text-light');

            (/^\w+$/.test(username)) ? $("#uname_special").addClass('text-light') : $("#uname_special").removeClass('text-light');

            (usernamePattern.test(username)) ? reqs['username'] = true : reqs['username'] = false;

            reqCheck();

        });
        
        $(document).click(function(event){
            if ($(event.target).closest("#username").length === 0 &&
            $(event.target).closest("#uname_reqs").length === 0) {
                $('#uname_reqs').addClass('d-none');
            }
        });
        
        $(document).on('blur', function(event){
            if ($(event.target).closest("#username").length === 0 &&
            $(event.target).closest("#uname_reqs").length === 0) {
                $('#uname_reqs').addClass('d-none');
            }
        });

        $('#password').click(function() {
            $('#pass_reqs').removeClass('d-none');
        });

        $('#password').on('input', function() {
            password = $(this).val().trim();

            let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[\w\W]{8,}$/;

            (/^.{8,}$/.test(password)) ? $('#pass_len').addClass('text-light') : $('#pass_len').removeClass('text-light');

            (/^(?=.*[a-z])(?=.*[A-Z]).+$/.test(password)) ? $('#pass_case').addClass('text-light') : $('#pass_case').removeClass('text-light');

            (/^(?=.*\d).+$/.test(password)) ? $('#pass_digit').addClass('text-light') : $('#pass_digit').removeClass('text-light');
            
            (/^(?=.*[\W_]).+$/.test(password)) ? $('#pass_special').addClass('text-light') : $('#pass_special').removeClass('text-light');

            (passwordPattern.test(password)) ? reqs['password'] = true : reqs['password'] = false;

            reqCheck();

        });
        
        $(document).click(function(event){
            if ($(event.target).closest("#password").length === 0 &&
            $(event.target).closest("#pass_reqs").length === 0) {
                $('#pass_reqs').addClass('d-none');
            }
        });

        $('#confirm_password').click(function() {
            $('#confirm_pass_reqs').removeClass('d-none');
        });

        $('#confirm_password').on('input', function() {
            let confirm_password = $(this).val().trim();

            if (password == confirm_password) {
                $('#confirm_pass_match').addClass('text-light');
                reqs['confirm_password'] = true;
            } else {
                $('#confirm_pass_match').removeClass('text-light');
                reqs['confirm_password'] = false;
            }

            reqCheck();

        });

        $(document).click(function(event){
            if ($(event.target).closest("#confirm_password").length === 0 &&
            $(event.target).closest("#confirm_pass_reqs").length === 0) {
                $('#confirm_pass_reqs').addClass('d-none');
            }
        });

        $('#mobile').click(function() {
            $('#mobile_reqs').removeClass('d-none');
        });

        $('#mobile').on('input', function() {
            let mobile = $(this).val().trim();

            if (mobile.length == 10) {
                $('#mobile_reqs').addClass('text-light');
                reqs['mobile'] = true;
            } else {
                $('#mobile_reqs').removeClass('text-light');
                reqs['mobile'] = false;
            }

            reqCheck();

        });

        $(document).click(function(event){
            if ($(event.target).closest("#mobile").length === 0 &&
            $(event.target).closest("#mobile_reqs").length === 0) {
                $('#mobile_reqs').addClass('d-none');
            }
        });

    }
    // Sign Up Requirements

    // Heart Mechanics
    let heartIcon;
    let hearted = false;

    $("button.heart").click(function() {
        heartIcon = $(this).find("i");
        hearted = heartIcon.hasClass("bi-suit-heart-fill");

        if (hearted) {
            heartIcon.removeClass("bi-suit-heart-fill").addClass("bi-suit-heart");
        } else {
            heartIcon.removeClass("bi-suit-heart").addClass("bi-suit-heart-fill");
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
            if ($('.btn-carousel').outerHeight() < $(document).outerHeight()) {
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
    {
        let signToggler;
        let signToggled = false;
    
        $(".sign-toggler").click(function() {
            signToggler = $(this).find("span");
            signToggled = signToggler.text() == "<";
    
            if (signToggled) {
                signToggler.text(">");
                $(this).parent().parent().find('button.modal-switch').fadeOut('fast', 'swing');
            } else {
                signToggler.text("<");
                $(this).parent().parent().find('button.modal-switch').fadeIn('fast', 'swing');
            }
        });
    }
    // Modal Transfer

});