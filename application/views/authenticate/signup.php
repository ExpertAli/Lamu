<div class="container-fluid py-3 px-lg-5">
	<!-- <form method="post"> -->
   <?php echo validation_errors(); echo form_open('login/signup'); ?>
      <h2 class="text-center py-2"><strong>Create an account.</strong></h2>
      <div class="form-group">
        <input class="form-control" type="text" name="fullname" placeholder="Fullname" min="3" maxlength="100" value="<?php echo set_value('fullname'); ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="phonenumber" placeholder="Phone number : 0700 000 000" value="<?php echo set_value('phonenumber'); ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)">
      </div>
      <div class="form-group">
          <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="signup">Sign Up</button></div>
      <div class="text-center"><span>You already have an account?</span><a href="<?php echo base_url("login/index"); ?>" class="mx-2"><b>Login here.</b></a></div>
</form></div>
