

<!-- Sign Up Modal -->
<article class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  
  <!-- Sign Up Modal Dialog -->
  <div class="modal-dialog d-flex justify-content-center align-items-center m-0">

    <!-- Sign Up Modal Content -->
    <div class="modal-content bg-secondary">

      <!-- Sign Up Modal Header -->
      <section class="modal-header bg-dark text-light">
        
        <!-- Sign Up Modal Header Elements -->
        <span class="col-11 d-flex justify-content-start align-items-center p-0 gap-2">
          
          <!-- Sign Up Modal Header Icon -->
          <img class="img" src="../assets/img/icons/pokedopt.ico" alt="PokéDopt Icon" id="sign-icon">
          <!-- Sign Up Modal Header Icon -->

          <!-- Sign Up Modal Header Title -->
          <h5 class="modal-title" id="modal-title">PokéDopt: Sign Up</h5>
          <!-- Sign Up Modal Header Title -->
          
          <!-- Sign Up Modal Header Switch Modal Toggler -->
          <button class="btn btn-outline-light border-0 sign-toggler" type="button" title="Switch to Sign In">
            
            <!-- Sign Up Modal Header Switch Modal Toggler Icon -->
            <span class="fs-4 lh-1 p-0">></span>
            <!-- Sign Up Modal Header Switch Modal Toggler Icon -->

          </button>
          <!-- Sign Up Modal Header Switch Modal Toggler -->

          <!-- Sign Up Modal Header Switch Modal -->
          <button class="btn btn-outline-light modal-switch" data-bs-toggle="modal" data-bs-target="#sign-in-modal" autofocus>

            <!-- Sign Up Modal Header Switch Modal Title -->
            <span class="fs-4">
              Sign In
            </span>
            <!-- Sign Up Modal Header Switch Modal Title -->

          </button>
          <!-- Sign Up Modal Header Switch Modal -->

        </span>
        <!-- Sign Up Modal Header Elements -->
        
        <!-- Sign Up Modal Header Close -->
        <button class="btn-close bg-light me-1" type="button" data-bs-dismiss="modal" aria-labelledby="Close"></button>
        <!-- Sign Up Modal Header Close -->

      </section>
      <!-- Sign Up Modal Header -->
      
      <!-- Sign Up Modal Body -->
      <section class="modal-body">

        <!-- Sign Up Modal Body Form -->
        <form action="index.php" id="signUp-form" method="POST">
          
          <!-- Account Credentials Fieldset -->
          <fieldset class="text-dark d-flex flex-column gap-2">
  
            <!-- Account Credentials Fieldset Legend -->
            <legend class="border-bottom border-dark my-2">Account Credentials:</legend>
            <!-- Account Credentials Fieldset Legend -->
  
            <!-- Account Credentials Username -->
            <input type="text" class="form-control bg-dark text-light border-dark" placeholder="Username" name="username" required>
            <!-- Account Credentials Username -->
  
            <!-- Account Credentials Email -->
            <input type="email" class="form-control bg-dark text-light border-dark" placeholder="Email" name="email" required>
            <!-- Account Credentials Email -->
  
            <!-- Account Credentials Password -->
            <input type="password" class="form-control bg-dark text-light border-dark" placeholder="Password" name="password" required>
            <!-- Account Credentials Password -->
  
            <!-- Account Credentials Confirm Password -->
            <input type="password" class="form-control bg-dark text-light border-dark" placeholder="Confirm Password" name="confirm-password" required>
            <!-- Account Credentials Confirm Password -->
  
          </fieldset>
          <!-- Account Credentials Fieldset -->
        
          <!-- Personal Information Fieldset -->
          <fieldset class="text-dark d-flex flex-column gap-2">
  
            <!-- Personal Information Fieldset Legend -->
            <legend class="border-bottom border-dark my-2">Personal Information:</legend>
            <!-- Personal Information Fieldset Legend -->

            <!-- Personal Information Name -->
            <section class="d-flex gap-2">
              
              <!-- Personal Information First Name -->
              <input type="text" class="form-control bg-dark text-light border-dark" placeholder="First Name" name="fname" required>
              <!-- Personal Information First Name -->

              <!-- Personal Information Last Name -->
              <input type="text" class="form-control bg-dark text-light border-dark" placeholder="Last Name" name="lname">
              <!-- Personal Information Last Name -->

            </section>
            <!-- Personal Information Name -->

            <section class="input-group">
              <span class="input-group-text bg-dark text-light border-dark">+63</span>
              <input type="tel" class="form-control bg-dark text-light border-dark" placeholder="Mobile Number" name="mobile-number" pattern="[0-9]{10}" required>
            </section>
            
            <section class="input-group">
              
              <span class="input-group-text bg-dark text-light border-dark" title="Birthday">
                <i class="bi bi-cake2 fs-5"></i>
              </span>
              
              <input type="date" class="form-control bg-dark text-light border-dark" placeholder="Birthday" name="birthday" required>
            </section>

  
          </fieldset>
          <!-- Personal Information Fieldset -->

        </form>
        <!-- Sign Up Modal Body Form -->

      </section>
      <!-- Sign Up Modal Body -->
      
      <!-- Sign Up Modal Footer -->
      <div class="modal-footer bg-dark">
        
        <!-- Sign Up Modal Submit -->
        <button class="btn btn-secondary fw-bolder" type="submit" form="signIn-form" name="submit" id="signUp-submit">Submit</button>
        <!-- Sign Up Modal Submit -->

      </div>
      <!-- Sign Up Modal Footer -->

    </div>
    <!-- Sign Up Modal Content -->

  </div>
  <!-- Sign Up Modal Dialog -->

</article>
<!-- Sign Up Modal -->