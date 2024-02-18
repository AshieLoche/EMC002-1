<?php

    $signInStatus = false;

    if ($signInStatus) {
        $headerNav = 'components/headerNav.php';
        $mainContent = 'components/mainContent.php';
        $footer = 'components/footer.php';
        $sideNav = 'components/sideNav.php';
    } else {
        $headerNav = 'components/headerNav.php';
        $mainContent = 'components/guest.php';
        $footer = 'components/footer.php';
        $sideNav = 'components/sideNav.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap CDN -->

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap Icon CDN -->

    <!-- Website Header -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>PokéDopt</title>
    <!-- Website Header -->

    <!-- External CSS -->
    <link rel="stylesheet" href="main.css">
    <!-- External CSS -->
</head>
<body>
    <!-- Content Container -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row no-gutters">
            <!-- Main Content Container -->
            <div class="main col-md-11 order-md-2 p-0 m-0">
                <!-- Header Navbar -->
                <?php require_once $headerNav ; ?>
                <!-- Header Navbar -->

                <!-- Main Content -->
                <?php require_once $mainContent; ?>
                <!-- Main Content -->

                <!-- Footer -->
                <?php require_once $footer; ?>
                <!-- Footer -->
            </div>
            <!-- Main Content Container -->

            <!-- Side Content Container -->
                <?php require_once $sideNav ; ?>
            <!-- Side Content Container -->
        </div>
        <!-- Content Row -->
    </div>
    <!-- Content Container -->

    <div class="modal fade" id="sign-in-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                 
        <div class="modal-dialog d-flex justify-content-center align-items-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Get the Latest Updates</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-labelledby="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod eum iste blanditiis architecto beatae necessitatibus quisquam at aperiam veritatis neque numquam ab placeat, temporibus provident.</p>
                    <label for="modal-email" class="form-label">Your email address:</label>
                    <input type="text" class="form-control" id="modal-email" placeholder="e.g. mario@example.com">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap JS CDN -->

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- JQuery CDN -->

    <!-- External JavaScript -->
    <script src="main.js"></script>
    <!-- External JavaScript -->

    <script>
        $(document).ready(function() {
            let signInStatus = '<?php echo $signInStatus; ?>';
            if (signInStatus) {
                $(".main").addClass("col-md-11");
                $(".carousel-buttons a").each(function(index, value) {
                    if (index > 1) {
                        $(this).removeClass("d-none");
                    }
                });
            } else {
                $(".main").removeClass("col-md-11");
                $(".carousel-buttons a").each(function(index, value) {
                    if (index > 1) {
                        $(this).addClass("d-none");
                    }
                });
            }
        });
    </script>
</body>
</html>