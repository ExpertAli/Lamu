<div class="container-fluid py-3 px-lg-5">
   <?php echo validation_errors(); echo form_open('user/create'); ?>
      <h2 class="text-center py-2"><strong>Add user.</strong></h2>
      <div class="form-group">
        <input class="form-control" type="text" name="fullname" placeholder="Fullname" min="3" maxlength="100" value="<?php echo set_value('fullname'); ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)">
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="signup">Submit</button></div>
</form></div>
