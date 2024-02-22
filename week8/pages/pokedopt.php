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
            type2.type as type2,
            pokemon.description
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
        }

        // Close Connection
        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Meta -->
        
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Bootstrap CDN -->
        
        <!-- Bootstrap Icon CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Bootstrap Icon CDN -->
        
        <!-- Website Header -->
        <link rel="icon" type="image/x-icon" href="assets/img/icons/pokedopt.ico">
        <title>PokéDopt</title>
        <!-- Website Header -->
        
        <!-- Components CSS -->
        <link rel="stylesheet" href="styles/components.css">
        <!-- Components CSS -->
    
    </head>
    <body class="bg-secondary">
        
        <!-- Page Container -->
        <div class="container-fluid">

            <!-- Page Row -->
            <div class="row">

                <!-- Primary Section -->
                <section class="primary col-md-10 order-md-2 p-0">
                    
                    <!-- Header Nav -->
                <?php require '../components/headerNav.php' ?>
                    <!-- Header Nav -->

                    <!-- Main -->
                    <main class="bg-secondary">

                        <!-- Main Container -->
                        <div class="container-fluid bg-info">
                            
                            <!-- Main Row -->
                            <div class="row gap-5 p-4 py-sm-5 justify-content-center bg-danger">

                                <?php foreach ($pokemon as $poke) { ?>

                                    <!-- Pokémon Card -->
                                    <article class="card bg-dark text-light border-dark rounded-5 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3 p-0">
                                        
                                        <!-- Pokémon Card Image -->
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($poke['img']); ?>" alt="<?php echo $poke['species']; ?>" class="card-img-top img rounded-top-5 border-bottom border-bottom">
                                        <!-- Pokémon Card Image -->

                                        <!-- Pokémon Card Body -->
                                        <section class="card-body pt-3 px-4 pb-5">
                                            
                                            <!-- Pokémon Card Header Container -->
                                            <div class="border-bottom pb-2 mb-3 container fluid">

                                                <!-- Pokémon Card Header Row -->
                                                <div class="row">

                                                    <!-- Pokémon Card Header -->
                                                    <a href="#" class="card-header display-3 col-10 col-lg-9 p-0 text-decoration-none border-0">
                                                        <?php echo $poke['name']; ?>
                                                    </a>
                                                    <!-- Pokémon Card Header -->

                                                    <!-- Pokémon Card Button Span -->
                                                    <span class="col-2 col-lg-3 d-flex justify-content-end align-items-center p-0">
                                                        
                                                        <!-- Pokémon Card Button -->
                                                        <button class="btn btn-outline-light border-0 p-0 px-2">

                                                            <!-- Pokémon Card Button Title -->
                                                            <i class="card-header p-0 bi bi-suit-heart display-3"></i>
                                                            <!-- Pokémon Card Button Title -->

                                                        </button>
                                                        <!-- Pokémon Card Button -->

                                                    </span>
                                                    <!-- Pokémon Card Button Span -->

                                                </div>
                                                <!-- Pokémon Card Header Row -->

                                            </div>
                                            <!-- Pokémon Card Header Container -->
                                            
                                            <!-- Pokémon Card Title -->
                                            <section class="card-title display-4 fs-2">
                                                <?php echo $poke['species']; ?>
                                            </section>
                                            <!-- Pokémon Card Title -->
                                            
                                            <!-- Pokémon Card Description -->
                                            <section class="card-text display-5 fs-4 lh-sm">
                                                <?php echo $poke['description']; ?>
                                            </section>
                                            <!-- Pokémon Card Description -->

                                        </section>
                                        <!-- Pokémon Card Body -->

                                    </article>
                                    <!-- Pokémon Card -->

                                <?php } ?>

                            </div>
                            <!-- Main Row -->

                        </div>
                        <!-- Main Container -->

                    </main>
                    <!-- Main -->

                </section>
                <!-- Primary Section -->
                
                <!-- Side Nav -->
                <?php require '../components/sideNav.php' ?>
                <!-- Side Nav -->

            </div>
            <!-- Page Row -->

        </div>
        <!-- Page Container -->
    
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Bootstrap JS CDN -->
        
        <!-- JQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- JQuery CDN -->

        <!-- Components JavaScript -->
        <script src="javascripts/components.js"></script>
        <!-- Components JavaScript -->

    </body>
</html>