<?php

    require('config/db_connect.php');

    $email = $title = $ingredients = "";

    $errors = array(
        'email' => '',
        'title' => '',
        'ingredients' => '',
    );

    if (isset($_POST['submit'])) {

        // Check Email
        if (empty($_POST['email'])) {
            $errors['email'] = 'An email is required<br><br>';
        } else {
            $email = $_POST['email'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid Email: Please enter a valid email.<br><br>';
            }
        }

        // Check Title
        if (empty($_POST['title'])) {
            $errors['title'] = 'A title is required<br><br>';
        } else {
            $title = $_POST['title'];

            if (!preg_match('/^[a-zA-Z\s]+$/',$title)) {
                $errors['title'] = 'Invalid Title: Please enter letters and spaces only<br><br>';
            }
        }

        // Check Ingredients
        if (empty($_POST['ingredients'])) {
            $errors['ingredients'] = 'At least one ingredient is required<br><br>';
        } else {
            $ingredients = $_POST['ingredients'];

            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)) {
                $errors['ingredients'] = 'Invalid Ingredient/s: Please enter a comma separated list<br><br>>';
            }
        }

        if (array_filter($errors)) {
            // echo 'Errors in the form'; 
        } else {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // Create sql
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', ' $ingredients')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $title, $ingredients, $email);
            $stmt->execute();

            // Save to db and check
            if (mysqli_query($conn, $sql)) {
                header('Location: index.php');
            } else {
                echo 'Query error: ' . mysqli_error($conn);
            }

            $stmt->close();
            $conn->close();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php' ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" class="white" method="POST" id="addPizza">
            <label for="email">Your Email</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>" requireda>
            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label for="title">Pizza Title</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title) ?>" requireda>
            <div class="red-text"><?php echo $errors['title']; ?></div>

            <label for="ingredients">Ingredients</label>
            <input type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>" requireda>
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="SUBMIT" class="btn brand z-depth-0" form="addPizza">
            </div>
        </form>
    </section>

    <?php include 'templates/footer.php' ?>

    <script src="insertToDB.js"></script>

</html>