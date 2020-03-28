<div class="container-fluid my-5 py-2 mx-2 mx-lg-5 px-2 px-lg-5 py-3">
        <?php if(isset($_SESSION['feedback'])){
          echo '<div class="alert alert-success px-2">'.$_SESSION['feedback'].'</div>'; } ?>
          <?php
           echo form_open('login/index',array('class' => 'px-2 px-lg-5 '));
          ?>
            <h2 class="text-center">Forgot you Password</h2>

            <div class="form-group">
              <input class="border-primary form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
            </div>

            <div class="form-group my-2"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
        </form>
</div>
