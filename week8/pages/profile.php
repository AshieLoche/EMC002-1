<?php

    require '../config/db_connect.php';

    session_start();

    if (isset($_COOKIE['userID'])) {
        $_SESSION['userID'] = $_COOKIE['userID'];
    }

    if (!isset($_SESSION['userID'])) {
        header('Location: ../pages/guest.php');
        exit;
    }

    {
        
        $query = "SELECT username, mobile, bday FROM account WHERE id = {$_SESSION['userID']}";
        
        if (!mysqli_query($conn, $query)) {
            die('Query error: ' . mysqli_error($conn));
        } else {
            // Make Query & Get Result
            $result = mysqli_query($conn, $query);

            // Fetch the Resulting Rows as an Array
            $account = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free results From Memory
            mysqli_free_result($result);

            mysqli_close($conn);
            
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
                    
                    <!-- Header Nav -->
                    <?php require '../components/headerNav.php' ?>
                    <!-- Header Nav -->

                    <!-- Main -->
                    <main id="main-content" class="bg-secondary">

                        <!-- Main Container -->
                        <div class="container-fluid">
                            
                            <!-- Main Row -->
                            <div class="row gap-3 p-4 py-sm-5 justify-content-center">

                                <h1 class="display-1 fw-bold pb-3 border-bottom border-dark text-center"><?php echo $account[0]['username']; ?></h1>

                                <button class="btn btn-dark">Edit Profile</button>

                                <span>
                                    <span class="display-6 fw-bold border-bottom border-black py-1 pb-0">Mobile Number</span>
                                    <p class="fw-bold pt-3"><?php 
                                        echo $account[0]['mobile']
                                    ?></p>
                                </span>

                                <span>
                                    <span class="display-6 fw-bold border-bottom border-black pt-1 pb-0">Birthday</span>
                                    <p class="fw-bold pt-3"><?php 
                                        $dateObj = DateTime::createFromFormat('Y-m-d', $account[0]['bday']);
                                        if ($dateObj) {
                                            echo $dateObj->format('F d, Y');
                                        }
                                    ?></p>
                                </span>
                                
                                <span>
                                    <span class="display-6 fw-bold border-bottom border-black pt-1 pb-0">Age</span>
                                    <p class="fw-bold pt-3""><?php 
                                        $today = new DateTime();
                                        $interval = $today->diff($dateObj);
                                        echo $interval->y;
                                    ?></p>
                                </span>

                            </div>
                            <!-- Main Row -->

                        </div>
                        <!-- Main Container -->

                    </main>
                    <!-- Main -->

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