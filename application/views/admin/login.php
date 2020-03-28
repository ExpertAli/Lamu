<div class="container-fluid  px-lg-5 py-3 bg-light">
    <h2 class="text-center text-info py-2">Administrator Login</h2>
    <?php if(isset($_SESSION['feedback'])){
      echo '<div class="alert alert-danger px-2">'.$_SESSION['feedback'].'</div>'; } ?>
   <?php echo form_open('login/admin');?>
   <div class="form-group">
     <label class="form-label font-weight-bold">Email<?php echo form_error('email'); ?></label>
     <input class="form-control  border-dark" type="email" name="email" placeholder="Email"
     value="<?php echo set_value('email'); ?>">
   </div>
   <div class="form-group">
     <label class="form-label font-weight-bold">Password<?php echo form_error('password'); ?></label>
     <input class="border-dark form-control" type="password" name="password" placeholder="Password">
   </div>
   <div>  <a href="<?php echo base_url("login/forgot"); ?>" class="forgot">Forgot your password?</a></div>
   <div class="form-group py-2">
     <button class="btn btn-primary btn-block" type="submit">Log In</button>
   </div>
</div>
