<?php

    

?>

<!DOCTYPE html>
<html lang="en">
                    
                    <!-- Header Nav -->
                    <?php require '../components/headerNav.php' ?>
                    <!-- Header Nav -->

                    <!-- Main Content -->
                    <main>

                        <!-- Banner Section -->
                        <section class="banner-section">
                            
                            <!-- Banner -->
                            <img src="../assets/img/others/banner.jpg" alt="bg banner" class="img banner d-block container-xxl p-0">
                            <!-- Banner -->
                            
                            <!-- Banner Background -->
                            <img src="../assets/img/others/banner.jpg" alt="bg banner" class="img bg-banner d-none d-md-block">
                            <!-- Banner Background -->
                            
                        </section>
                        <!-- Banner Section -->
                        
                        <!-- Content Section -->
                        <section class="container-xxl text-white text-center p-4 pt-5 content-section">

                            <!-- Tagline -->
                            <p class="display-5 fs-2 fw-bold mb-4">
                                <span class="border-bottom">
                                    Finding the best Poké Partner has never been easier!
                                </span>
                            </p>
                            <!-- Tagline -->

                            <!-- Description -->
                            <p class="display-5 fs-3 my-4">
                                With <strong>PokéDopt</strong>, starting your Pokémon journey just requires a couple of clicks, and soon you’ll have a forever companion! Not only that, for people who just want a normal life and share their moments with their Poké Pals, then use the built-in social media platform to tell the world about the joys between you and your Pokémon.
                            </p>
                            <!-- Description -->

                            <section class="d-flex justify-content-center align-items-center gap-5 mt-5">

                                <button class="btn btn-outline-light p-3" data-bs-toggle="modal"  data-bs-target="#sign-in-modal">

                                    <span class="fs-bold fs-1" id="sign-in">
                                        Sign In
                                    </span>
                                </button>

                                <button class="btn btn-outline-light p-3" data-bs-toggle="modal"  data-bs-target="#sign-up-modal">

                                    <span class="fs-bold fs-1" id="sign-up">
                                        Sign Up
                                    </span>
                                </button>

                            </section>
                        </section>
                        <!-- Content Section -->

                    </main>
                    <!-- Main Content -->

                    <style>
                        main {
                            background-color: rgba(54,58,62,255);
                        }
                        .banner {
                            width: 100%;
                            height: 40vh;
                            position: relative;
                            z-index: 2;
                        }
                        .bg-banner {
                            width: 100%;
                            height: 40vh;
                            margin-top: -40vh;
                            filter: brightness(50%) blur(5px);
                            position: relative;
                            z-index: 1;
                        }
                        .content-section {
                            background-color: #5e6267;
                            height: 50vh;
                        }
                    </style>
                    <!-- Main Content -->

                    <!-- Footer -->
                    <?php require '../components/footer.php' ?>
                    <!-- Footer -->

                </section>
                <!-- Primary Section -->
                
                <!-- Side Nav -->
                <?php require '../components/sideNav.php' ?>
                <!-- Side Nav -->
                
                <!-- Sign In Modal -->
                <?php require '../components/signIn.php' ?>
                <!-- Sign In Modal -->

                <!-- Sign Up Modal -->
                <?php require '../components/signUp.php' ?>
                <!-- Sign Up Modal -->

            
</html>


<style>
    /* main.guest {
        background-color: rgba(54,58,62,255);
    }
    main.guest .display-5 {
        height: initial;
        overflow: visible;
    }
    main.guest .container-fluid {
        position: relative;
        overflow: hidden;
    }
    main.guest .content {
        background-color: #5e6267;
        min-height: 55vh !important;
    }

    main.guest .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        filter: blur(5px);
        -webkit-filter: blur(5px);
    }

    main.guest .background-darken {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        background-color: rgba(0, 0, 0, 0.5);
    }

    main.guest div.banner, main.guest img.banner {
        width: 100%;
        min-height: 45vh !important;
        max-height: 45vh !important;
        background-image: url('assets/img/banner.jpg');
        background-size: cover;
        background-position: center;
        filter: blur(0);
        position: relative;
        z-index: 2;
    }

    @media screen and (min-width: 768px) {
        main.guest .content {
            min-height: 65vh !important;
        }
        main.guest img.banner {
            max-height: 35vh !important;
        }
    } */
</style>
<!-- Main Content -->