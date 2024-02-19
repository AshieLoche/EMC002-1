<div class="modal fade p-0 m-0" id="sign-in-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog d-flex justify-content-center align-items-center my-0">
    <div class="modal-content bg-secondary">
      <div class="modal-header bg-dark text-light">
        <span class="col-11 d-flex justify-content-start align-items-center m-0 p-0">
          <span class="m-0 p-1 border-bottom d-flex justify-content-center align-items-center gap-2">
            <img class="img" src="assets/img/favicon.ico" alt="PokéDopt Icon">
            <h5 class="modal-title" id="modal-title">PokéDopt: Sign In</h5>
          </span>
          <span class="m-0 p-1">
            <button class="btn btn-outline-light border-0 p-2 sign-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#signUp" aria-controls="signUp" aria-expanded="false" aria-label="Toggle Sign Up">
              <span class="fs-4 lh-1 p-0">></span>
            </button>
          </span>
          
          <div class="collapse horizontal-collapse m-0 p-0" id="signUp">
            <div class="collapse-content">
              <button class="btn btn-outline-light p-2" data-bs-toggle="modal" data-bs-target="#sign-up-modal" autofocus>
                <!-- Header Navbar PokéList Button Title -->
                <span class="fs-5">
                  Sign Up
                </span>
                <!-- Header Navbar PokéList Button Title -->
              </button>
            </div>
          </div>
        </span>
        
        <button class="btn-close bg-light" type="button" data-bs-dismiss="modal" aria-labelledby="Close"></button>
      </div>
      
      <div class="modal-body">

        <form action="index.php" id="signIn-form" method="POST">
          <div class="container-fluid">
            <div class="row gap-2">
                <div class="col-12">
                  <input type="email" class="form-control bg-dark text-light border-dark" placeholder="Email" name="email" required>
                </div>
                <div class="col-12">
                  <input type="password" class="form-control bg-dark text-light border-dark" placeholder="Password" name="password" required>
                </div>
            </div>
          </div>
        </form>
      </div>
      
      <div class="modal-footer bg-dark">
        <button class="btn btn-primary" type="submit" form="signIn-form" name="submit" id="signUp-submit">Submit</button>
      </div>
    </div>
  </div>
</div>