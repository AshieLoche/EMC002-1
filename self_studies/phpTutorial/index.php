<?php

    require('config/db_connect.php');

    // Write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // Make Query & Get Result
    $result = mysqli_query($conn, $sql);

    // Fetch the Resulting Rows as an Array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free results From Memory
    mysqli_free_result($result);

    // Close Connections
    mysqli_close($conn);

    // print_r(explode(',', $pizzas[0]['ingredients']));

?>

<!DOCTYPE html>
<html lang="en">

    <?php require 'templates/header.php' ?>

    <h4 class="center gray-text">Pizzas!</h4>

    <div class="container">
        <div class="row">

            <?php foreach($pizzas as $pizza): ?>

                <div class="col s6 md3">

                    <div class="card z-depth-0">

                        <img src="img/pizza.svg" alt="" class="pizza">

                        <div class="card-content center">

                            <h6>
                                <?php echo htmlspecialchars($pizza['title']); ?>
                            </h6>

                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                    <li>
                                        <?php echo htmlspecialchars($ing); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>

                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More Info</a>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

            <!-- <?php if (count($pizzas) >= 3): ?>
                <p>There are 3 or more pizzas.</p>
            <?php else: ?>
                <p>There are less than 3 pizzas.</p>
            <?php endif; ?> -->

        </div>
    </div>

    <?php require 'templates/footer.php' ?>

</html>