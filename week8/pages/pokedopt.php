<?php

    require '../config/db_connect.php';

    // Pokemon Table
    {

        // Select Pokemon Data
        $sql = 
        "SELECT
            pokemon.id,
            pokemon.img,
            pokemon.name,
            species.species,
            type1.type as type1,
            type2.type as type2
        FROM pokedopt.pokemon as pokemon
        INNER JOIN pokedopt.species as species ON pokemon.species_id = species.id
        INNER JOIN pokedopt.type as type1 ON species.type1_id = type1.id
        INNER JOIN pokedopt.type as type2 ON species.type2_id = type2.id";

        // SQL Check
        if (!mysqli_query($conn, $sql)) {
            die('Query error: ' . mysqli_error($conn));
        } else {
            // Make Query & Get Result
            $result = mysqli_query($conn, $sql);

            // Fetch the Resulting Rows as an Array
            $pokemon = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free results From Memory
            mysqli_free_result($result);

            // foreach ($pokemon as $poke) {
            //     echo '<img src="data:image/jpeg;base64,' . base64_encode($poke['img']) . '" style="width: 500px; height: 500p;" />';
            //     echo "<p> {$poke['name']} </p>";
            //     echo "<p> {$poke['species']} </p>";
            //     echo "<p> {$poke['type1']} </p>";
            //     echo "<p> {$poke['type2']} </p>";
            // }
        }

        // Close Connection
        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html lang="en">
    <body class="bg-secondary">
        
        <!-- Page -->
        <div class="container-fluid">

            <!-- Page Row -->
            <div class="row">

                <!-- Primary Section -->
                <section class="primary col-md-10 order-md-2 p-0">
                    
                    <!-- Header Nav -->
                <?php include '../components/headerNav.php' ?>
                    <!-- Header Nav -->

                    <!-- Main -->
                    <main class="bg-secondary" id="pokedoptables">

                        <!-- Main Container -->
                        <div class="container-fluid bg-info">
                            
                            <!-- Main Row -->
                            <div class="row gap-5 p-4 py-sm-5 justify-content-center bg-danger">
                                
                                <!-- Pokémon Card 1 -->
                                <article class="card bg-dark text-light border-light rounded-5 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3 p-0">
                                    
                                    <!-- Pokémon Card 1 Image -->
                                    <img src="assets/img/chandelure.jpg" alt="Chandelure" class="card-img-top img rounded-5">
                                    <!-- Pokémon Card 1 Image -->

                                    <!-- Pokémon Card 1 Body -->
                                    <section class="card-body pt-3 px-4 pb-5">
                                        
                                        <!-- Pokémon Card 1 Title Container -->
                                        <div class="border-bottom pb-2 container fluid">

                                            <!-- Pokémon Card 1 Title Row -->
                                            <div class="row">

                                                <!-- Pokémon Card 1 Title -->
                                                <a href="#" class="card-header display-3 col-10 col-lg-9 p-0 bg-info text-decoration-none">
                                                    Amier
                                                </a>
                                                <!-- Pokémon Card 1 Title -->

                                                <!-- Pokémon Card 1 Button Container -->

                                            </div>
                                            <!-- Pokémon Card 1 Title Row -->

                                        </div>
                                        <!-- Pokémon Card 1 Title Container -->

                                    </section>
                                    <!-- Pokémon Card 1 Body -->

                                </article>
                                <!-- Pokémon Card 1 -->
                                
                                <!-- Pokémon Card 2 -->
                                <article class="card bg-dark text-light border-light rounded-5 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3 p-0">
                                    OwO
                                </article>
                                <!-- Pokémon Card 2 -->

                            </div>
                            <!-- Main Row -->

                        </div>
                        <!-- Main Container -->

                    </main>
                    <!-- Main -->

                </section>
                <!-- Primary Section -->
                
                <!-- Side Nav -->
                <?php include '../components/sideNav.php' ?>
                <!-- Side Nav -->

            </div>
            <!-- Page Row -->

        </div>
        <!-- Page -->
    
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Bootstrap JS CDN -->
        
        <!-- JQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- JQuery CDN -->

        <!-- Components JavaScript -->
        <script src="../javascripts/components.js"></script>
        <!-- Components JavaScript -->

    </body>
</html>