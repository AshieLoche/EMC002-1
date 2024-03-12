<!-- Sign Up Modal -->
<article class="modal fade" id="sign_up_modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  
  <!-- Sign Up Modal Dialog -->
  <section class="modal-dialog d-flex justify-content-center align-items-center m-0">

    <!-- Sign Up Modal Content -->
    <section class="modal-content bg-secondary">

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
          <button class="btn btn-outline-light modal-switch" data-bs-toggle="modal" data-bs-target="#sign_in_modal" autofocus>

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
      <section class="modal-body fw-bold">

        <!-- Sign Up Modal Body Form -->
        <form action="../components/signUpProcess.php" id="signUp_form" method="POST" class="d-flex flex-column gap-3">
          
          <!-- Account Credentials Fieldset -->
          <fieldset class="text-dark d-flex flex-column gap-2">
  
            <!-- Account Credentials Fieldset Legend -->
            <legend class="border-bottom border-dark">Account Credentials:</legend>
            <!-- Account Credentials Fieldset Legend -->
  
            <!-- Account Credentials Username -->
            <input type="text" class="form-control bg-dark text-light border-dark" id="username" placeholder="Username" name="username" required>
            <!-- Account Credentials Username -->

            <!-- Username Requirements -->
            <section class="d-none" id="uname_reqs">
              <p class="m-0" id="uname_len">
                - Must be between 6 - 20 characters long
              </p>
              <p class="m-0" id="uname_special">
                - Must not contain special characters except for an optional underscore "_"
              </p>
            </section>
            <!-- Username Requirements -->
  
            <!-- Account Credentials Email -->
            <input type="email" class="form-control bg-dark text-light border-dark" id="email" placeholder="Email" name="email" required>
            <!-- Account Credentials Email -->
  
            <!-- Account Credentials Password -->
            <input type="password" class="form-control bg-dark text-light border-dark" id="password" placeholder="Password" name="password" required>
            <!-- Account Credentials Password -->

            <!-- Password Requirements -->
            <section class="d-none" id="pass_reqs">
              <p class="m-0" id="pass_len">
                - Must be at least 8 characters long
              </p>
              <p class="m-0" id="pass_case">
                - Must be a combination of upper & lower case
              </p>
              <p class="m-0" id="pass_digit">
                - Must have at least 1 digit
              </p>
              <p class="m-0" id="pass_special">
                - Must have at least 1 special character
              </p>
            </section>
            <!-- Password Requirements -->
  
            <!-- Account Credentials Confirm Password -->
            <input type="password" class="form-control bg-dark text-light border-dark" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
            <!-- Account Credentials Confirm Password -->

            <!-- Confirm Password Requirements -->
            <section class="d-none" id="confirm_pass_reqs">
              <p class="m-0" id="confirm_pass_match">
                - Must match password
              </p>
            </section>
            <!-- Confirm Password Requirements -->
  
          </fieldset>
          <!-- Account Credentials Fieldset -->
        
          <!-- Personal Information Fieldset -->
          <fieldset class="text-dark d-flex flex-column gap-2">
  
            <!-- Personal Information Fieldset Legend -->
            <legend class="border-bottom border-dark">Personal Information:</legend>
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

            <!-- Personal Information Mobile -->
            <section class="input-group">

              <!-- Personal Information Last Mobile Prefix -->
              <span class="input-group-text bg-dark text-light border-dark">+63</span>
              <!-- Personal Information Last Mobile Prefix -->

              <!-- Personal Information Last Mobile Number -->
              <input type="tel" class="form-control bg-dark text-light border-dark" id="mobile" placeholder="Mobile Number" name="mobile" pattern="[0-9]{10}" required>
              <!-- Personal Information Last Mobile Number -->

            </section>
            <!-- Personal Information Mobile -->

            <!-- Mobile Requirements -->
            <section class="d-none" id="mobile_reqs">
              <p class="m-0" id="mobile_len">
                - Must be a valid number
              </p>
            </section>
            <!-- Mobile Requirements -->
            
            <!-- Personal Information Birthday -->
            <section class="input-group">
              
              <!-- Personal Information Birthday Icon -->
              <span class="input-group-text bg-dark text-light border-dark" title="Birthday">
                <i class="bi bi-cake2 fs-5"></i>
              </span>
              <!-- Personal Information Birthday Icon -->
              
              <!-- Personal Information Birthday Date -->
              <input type="date" class="form-control bg-dark text-light border-dark" placeholder="Birthday" name="bday" required>
              <!-- Personal Information Birthday Date -->
              
            </section>
            <!-- Personal Information Birthday -->
  
          </fieldset>
          <!-- Personal Information Fieldset -->

        </form>
        <!-- Sign Up Modal Body Form -->

      </section>
      <!-- Sign Up Modal Body -->
      
      <!-- Sign Up Modal Footer -->
      <section class="modal-footer bg-dark d-flex justify-content-between">

        <!-- Auto Sign In Fieldset -->
        <fieldset class="text-light fs-5">

          <!-- Auto Sign In Checkbox -->
          <input type="checkbox" name="remember" id="remember_signUp" class="remember" value="remember" form="signUp_form" disabled>
          <!-- Auto Sign In Checkbox -->
          
          <!-- Auto Sign In Label -->
          <label for="remember_signUp">Remember me</label>
          <!-- Auto Sign In Label -->
          
        </fieldset>
        <!-- Auto Sign In Fieldset -->
        
        <!-- Sign Up Modal Submit -->
        <button class="btn btn-secondary fw-bolder" type="submit" form="signUp_form" name="signUp" id="signUp_submit">Submit</button>
        <!-- Sign Up Modal Submit -->

      </section>
      <!-- Sign Up Modal Footer -->

    </section>
    <!-- Sign Up Modal Content -->

  </section>
  <!-- Sign Up Modal Dialog -->

</article>
<!-- Sign Up Modal -->