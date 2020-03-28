<div class="container-fluid mx-5 px-5 py-3">
        <!-- <form method="post"> -->
          <?php 
           echo form_open('login/index');
          ?>
            <h2 class="text-center">Login Form</h2>
            
            <div class="form-group">
              <input class="border-primary form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group"><input class="border-primary form-control" type="password" name="password" placeholder="Password"></div>
            <a href="<?php echo base_url("login/forgot"); ?>" class="forgot">Forgot your email or password?</a>
            <div class="form-group my-2"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
        </form>
</div>