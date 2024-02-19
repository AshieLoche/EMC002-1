<div class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">

  <div class="modal-dialog d-flex justify-content-center align-items-center m-0">

    <div class="modal-content bg-secondary">

      <div class="modal-header bg-dark text-light">

        <span class="col-11 d-flex justify-content-start align-items-center m-0 p-0">

          <span class="m-0 p-1 border-bottom d-flex justify-content-center align-items-center gap-2">

            <img class="img" src="assets/img/favicon.ico" alt="PokéDopt Icon">

            <h5 class="modal-title" id="modal-title">PokéDopt: Sign Up</h5>

          </span>
          
          <span class="m-0 p-1">

            <button class="btn btn-outline-light border-0 p-2 sign-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#signIn" aria-controls="signIn" aria-expanded="false" aria-label="Toggle Sign In">

              <span class="fs-4 lh-1 p-0">></span>

            </button>

          </span>
          
          <div class="collapse horizontal-collapse m-0 p-0" id="signIn">

            <div class="collapse-content">

              <button class="btn btn-outline-light p-2" data-bs-toggle="modal" data-bs-target="#sign-in-modal" autofocus>

                <!-- Header Navbar PokéList Button Title -->
                <span class="fs-5">
                  Sign In
                </span>
                <!-- Header Navbar PokéList Button Title -->

              </button>

            </div>

          </div>

        </span>
        
        <button class="btn-close bg-light" type="button" data-bs-dismiss="modal" aria-labelledby="Close"></button>
      </div>
      
      <div class="modal-body">

        <form action="index.php" id="signUp-form" method="POST">
          <div class="container-fluid">
            <div class="row gap-2">
              <fieldset class="text-dark d-flex flex-column gap-2">
                <legend class="border-bottom border-dark my-2">Account Credentials:</legend>
                <div class="col-12">
                  <input type="email" class="form-control bg-dark text-light border-dark" placeholder="Email" name="email" required>
                </div>
                <div class="col-12">
                  <input type="password" class="form-control bg-dark text-light border-dark" placeholder="Password" name="password" required>
                </div>
                <div class="col-12">
                  <input type="password" class="form-control bg-dark text-light border-dark" placeholder="Confirm Password" name="confirm-password" required>
                </div>
              </fieldset>
              
              <fieldset class="text-dark d-flex flex-column gap-2">
                <legend class="border-bottom border-dark my-2">Personal Information:</legend>
                <div class="col-12 d-flex justify-content-center gap-2">
                  <input type="text" class="form-control bg-dark text-light border-dark" placeholder="First Name" name="first-name" required>
                  <input type="text" class="form-control  bg-dark text-light border-dark" placeholder="Last Name" name="last-name" required>
                </div>
                <div class="col-12">
                  <div class="input-group">
                    <span class="input-group-text bg-dark text-light border-dark">+63</span>
                    <input type="tel" class="form-control bg-dark text-light border-dark" placeholder="Mobile Number" name="mobile-number" pattern="[0-9]{10}" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-group">
                    <span class="input-group-text bg-dark text-light border-dark" title="Birthday">
                      <i class="bi bi-cake2 fs-5"></i>
                    </span>
                    
                    <input type="date" class="form-control bg-dark text-light border-dark" placeholder="Birthday" name="birthday" required>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
      
      <div class="modal-footer bg-dark">

        <button class="btn btn-primary" type="submit" form="signUp-form" name="submit" id="signUp-submit">Submit</button>

      </div>

    </div>

  </div>

</div>

<style>
  .modal img {
    height: 1.5rem;
    width: 1.5rem;
    filter: brightness(0%) invert(1);
  }
  
  .horizontal-collapse {
    display: grid;
    grid-template-columns: 1fr 0px;
  }

  .collapse-content {
    display: flex;
    justify-content: center;
    align-items: center;
    grid-column: 1;
  }

  .modal .input-group input {
    border-left: 1px solid white !important;
  }
  
  .modal input[type="date"] {
    color-scheme: dark;
  }

  .modal input[type="date"]::-webkit-calendar-picker-indicator {
    font-size: 1.5rem;
  }

  .modal input[type="date"]::-webkit-datetime-edit {
    color: white;
  }

  .modal input[type="date"]::-webkit-datetime-edit-text {
    color: white;
  }

  .modal input[type="date"]::-webkit-datetime-edit-month-field,
  .modal input[type="date"]::-webkit-datetime-edit-day-field,
  .modal input[type="date"]::-webkit-datetime-edit-year-field {
    color: white;
  }

  .modal input[type="date"]::-webkit-inner-spin-button,
  .modal input[type="date"]::-webkit-clear-button {
    display: none;
  }

  .modal input[type="date"]::-webkit-calendar-picker {
    color: white;
  }
</style>