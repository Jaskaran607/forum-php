<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up for iDiscuss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="partials/_handleSignup.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
          </div>
          <div class="mb-3">
            <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="signupConfirmPassword" name="signupConfirmPassword" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </div>
        <div class="modal-footer justify-content-center">
          <p>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></p>
        </div>
      </form>
    </div>
  </div>
</div>