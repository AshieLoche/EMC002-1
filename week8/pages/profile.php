<?php

    require '../config/db_connect.php';

    session_start();

    $_SESSION['page'] = 'Profile';

    if (isset($_COOKIE['userID'])) {
        $_SESSION['userID'] = $_COOKIE['userID'];
    }

    if (!isset($_SESSION['userID'])) {
        header('Location: ../pages/guest.php');
        exit;
    }

    {
        
        $query = "SELECT pfp_url, username, bday, gender, mobile, typePreference, regionPreference FROM account WHERE id = {$_SESSION['userID']}";
        
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
                    <main id="main-content">

                        <!-- Main Container -->
                        <div class="container-xxl bg-secondary profile">
                            
                            <!-- Main Row -->
                            <div class="row gap-3 p-4 py-sm-5 justify-content-center">
                                
                                <section class="d-flex flex-column flex-sm-row pb-2 justify-content-center align-items-center gap-4">
                                    <img src="<?php echo $account[0]['pfp_url']; ?>" alt="Ashie_Loche" id="pfp" class="pfp bg-dark">
                                    
                                    <section class="d-flex flex-column gap-2 justify-content-center">
                                        <h1 class="display-3 fw-bold pb-3 border-bottom border-dark"><?php echo $account[0]['username']; ?></h1>
                                        
                                        <button onclick="location.href='../pages/editProfile.php'" class="btn btn-dark">Edit Profile</button>
                                    </section>
                                </section>

                                <section class="d-flex flex-column flex-md-row">
                                    
                                    <section class="col-12 col-md-6 d-flex flex-column gap-3 mb-3 mb-md-0">
                                        
                                        <span>
                                            <span class="display-6 fw-bold border-bottom border-black pt-1 pb-0">Gender</span>
                                            <p class="h3 fw-bold pt-3"><?php echo $account[0]['gender']; ?></p>
                                        </span>
                                        
                                        <span>
                                            <span class="display-6 fw-bold border-bottom border-black pt-1 pb-0">Mobile Number</span>
                                            <p class="h3 fw-bold pt-3"><?php echo $account[0]['mobile']; ?></p>
                                        </span>
                                        
                                        <span>
                                            <span class="display-6 fw-bold border-bottom border-black pt-1 pb-0">Birthday</span>
                                            <p class="h3 fw-bold pt-3"><?php 
                                                $dateObj = DateTime::createFromFormat('Y-m-d', $account[0]['bday']);
                                                if ($dateObj) {
                                                    echo $dateObj->format('F d, Y');
                                                }
                                            ?></p>
                                        </span>
                                        
                                        <span>
                                            <span class="display-6 fw-bold border-bottom border-black pt-1 pb-0">Age</span>
                                            <p class="h3 fw-bold pt-3"><?php 
                                                $today = new DateTime();
                                                $interval = $today->diff($dateObj);
                                                echo $interval->y;
                                            ?></p>
                                        </span>
                                        
                                    </section>
                                    
                                    <section class="col-12 col-md-6">
                                        
                                        <span>
                                            <span class="display-6 fw-bold border-bottom border-black">Type Preference/s</span>
                                            <span class="h4 fw-bold py-2 d-flex flex-column flex-lg-row">

                                                <ul class="col-12 col-lg-4 col-lg-4 mb-0">
                                                    <?php
                                                        $typePreferences = explode('/', $account[0]['typePreference']);
                                                        
                                                        for ($i = 0; $i < 6; $i++) {
                                                            echo '<li>' . $typePreferences[$i].'</li>';
                                                        }
                                                    ?>
                                                </ul>
                                                <ul class="col-12 col-lg-4 col-lg-4 m-0">
                                                    <?php
                                                        $typePreferences = explode('/', $account[0]['typePreference']);
                                                        
                                                        if(count($typePreferences) > 6) {
                                                            for ($i = 6; $i < 12; $i++) {
                                                                echo '<li>' . $typePreferences[$i].'</li>';
                                                            }
                                                        }
                                                    ?>
                                                    
                                                </ul>
                                                <ul class="col-12 col-lg-4">
                                                    
                                                    <?php
                                                        $typePreferences = explode('/', $account[0]['typePreference']);
                                                        
                                                        if(count($typePreferences) > 12) {
                                                            for ($i = 12; $i < 18; $i++) {
                                                                echo '<li>' . $typePreferences[$i].'</li>';
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </span>
                                        </span>
    
                                        <span>
                                            <span class="display-6 fw-bold border-bottom border-black">Region Preference/s</span>
                                            <span class="h4 fw-bold py-2 d-flex flex-column flex-lg-row">
                                                <ul class="col-12 col-lg-4 col-lg-4 mb-0">
                                                    <?php
                                                        $regionPreference = explode('/', $account[0]['regionPreference']);
                                                        
                                                        for ($i = 0; $i < 3; $i++) {
                                                            echo '<li>' . $regionPreference[$i].'</li>';
                                                        }
                                                    ?>
                                                </ul>
                                                <ul class="col-12 col-lg-4 col-lg-4 my-0">
                                                    <?php
                                                        $regionPreference = explode('/', $account[0]['regionPreference']);
                                                        
                                                        if(count($regionPreference) > 3) {
                                                            for ($i = 3; $i < 6; $i++) {
                                                                echo '<li>' . $regionPreference[$i].'</li>';
                                                            }
                                                        }
                                                    ?>
                                                    
                                                </ul>
                                                <ul class="col-12 col-lg-4">
                                                    
                                                    <?php
                                                        $regionPreference = explode('/', $account[0]['regionPreference']);
                                                        
                                                        if(count($regionPreference) > 6) {
                                                            for ($i = 6; $i < 9; $i++) {
                                                                echo '<li>' . $regionPreference[$i].'</li>';
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </span>
                                        </span>
    
                                    </section>
                                </section>

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

            
                
                <style>
                    #main-content {
                        background-color: rgba(54,58,62,255);
                    }
                    .profile {
                        min-height: 90vh;
                    }
                    .pfp {
                        height: 250px;
                        width: 250px;
                        border-radius: 100%;
                    }
                </style>
            
</html>