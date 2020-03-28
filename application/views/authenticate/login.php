<div class="container-fluid  px-lg-5 py-3">
    <h2 class="text-center py-2">login</h2>
    <?php if(isset($_SESSION['feedback'])){
      echo '<div class="alert alert-danger px-2">'.$_SESSION['feedback'].'</div>'; } ?>
   <?php echo form_open('login/index');?>
   <div class="form-group">
     <label class="form-label">Email<?php echo form_error('email'); ?></label>
     <input class="form-control border-primary" type="email" name="email" placeholder="Email"
     value="<?php echo set_value('email'); ?>">
   </div>
   <div class="form-group">
     <label class="form-label">Password<?php echo form_error('password'); ?></label>
     <input class="border-primary form-control" type="password" name="password" placeholder="Password">
   </div>
   <div>  <a href="<?php echo base_url("login/forgot"); ?>" class="forgot">Forgot your password?</a></div>
   <div class="form-group py-2">
     <button class="btn btn-primary btn-block" type="submit">Log In</button>
   </div>
</div>
