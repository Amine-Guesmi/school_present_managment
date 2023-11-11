<form id="myForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="email" class="form-label mt-4">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com" autocomplete="off">
    <div class="invalid-feedback">Please enter a valid email address.</div>
  </div>
  <div class="form-group">
    <label for="password" class="form-label mt-4">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
    <div class="invalid-feedback">Password must be at least 8 characters long.</div>
  </div>
  <button type="submit" name="loginButton" class="btn btn-primary mt-4" disabled>Submit</button>
</form>