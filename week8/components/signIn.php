<!-- Sign In Modal -->
<article class="modal fade" id="sign-in-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  
  <!-- Sign In Modal Dialog -->
  <div class="modal-dialog d-flex justify-content-center align-items-center m-0">

    <!-- Sign In Modal Content -->
    <div class="modal-content bg-secondary">

      <!-- Sign In Modal Header -->
      <section class="modal-header bg-dark text-light">
        
        <!-- Sign In Modal Header Elements -->
        <span class="col-11 d-flex justify-content-start align-items-center p-0 gap-2">
          
          <!-- Sign In Modal Header Icon -->
          <img class="img" src="../assets/img/icons/pokedopt.ico" alt="PokéDopt Icon" id="sign-icon">
          <!-- Sign In Modal Header Icon -->

          <!-- Sign In Modal Header Title -->
          <h5 class="modal-title" id="modal-title">PokéDopt: Sign In</h5>
          <!-- Sign In Modal Header Title -->
          
          <!-- Sign In Modal Header Switch Modal Toggler -->
          <button class="btn btn-outline-light border-0 sign-toggler" type="button" title="Switch to Sign Up">
            
            <!-- Sign In Modal Header Switch Modal Toggler Icon -->
            <span class="fs-4 lh-1 p-0">></span>
            <!-- Sign In Modal Header Switch Modal Toggler Icon -->

          </button>
          <!-- Sign In Modal Header Switch Modal Toggler -->

          <!-- Sign In Modal Header Switch Modal -->
          <button class="btn btn-outline-light modal-switch" data-bs-toggle="modal" data-bs-target="#sign-up-modal" autofocus>

            <!-- Sign In Modal Header Switch Modal Title -->
            <span class="fs-4">
              Sign Up
            </span>
            <!-- Sign In Modal Header Switch Modal Title -->

          </button>
          <!-- Sign In Modal Header Switch Modal -->

        </span>
        <!-- Sign In Modal Header Elements -->
        
        <!-- Sign In Modal Header Close -->
        <button class="btn-close bg-light me-1" type="button" data-bs-dismiss="modal" aria-labelledby="Close"></button>
        <!-- Sign In Modal Header Close -->

      </section>
      <!-- Sign In Modal Header -->
      
      <!-- Sign In Modal Body -->
      <section class="modal-body">

        <!-- Sign In Modal Body Form -->
        <form action="index.php" id="signIn-form" method="POST">
          
          <!-- Sign In Modal Body Form Container -->
          <div class="container-fluid">
            
            <!-- Sign In Modal Body Form Row -->
            <div class="row gap-2">
              
              <!-- Sign In Modal Body Form Email -->
              <input type="email" class="form-control bg-dark text-light border-dark" placeholder="Email" name="email" required>
              <!-- Sign In Modal Body Form Email -->
              
              <!-- Sign In Modal Body Form Password -->
              <input type="password" class="form-control bg-dark text-light border-dark" placeholder="Password" name="password" required>
              <!-- Sign In Modal Body Form Password -->

            </div>
            <!-- Sign In Modal Body Form Row -->

          </div>
          <!-- Sign In Modal Body Form Container -->
        
        </form>
        <!-- Sign In Modal Body Form -->

      </section>
      <!-- Sign In Modal Body -->
      
      <!-- Sign In Modal Footer -->
      <div class="modal-footer bg-dark">
        
        <!-- Sign In Modal Submit -->
        <button class="btn btn-primary" type="submit" form="signIn-form" name="submit" id="signUp-submit">Submit</button>
        <!-- Sign In Modal Submit -->

      </div>
      <!-- Sign In Modal Footer -->

    </div>
    <!-- Sign In Modal Content -->

  </div>
  <!-- Sign In Modal Dialog -->

</article>
<!-- Sign In Modal -->