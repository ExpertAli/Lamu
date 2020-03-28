<div class="container-fluid py-2">
    <?php if(isset($_SESSION['feedback'])){
      echo '<div class="alert alert-success text-center font-weight-bold  ">'.$_SESSION['feedback'].'</div>'; } ?>
      <?php
       echo form_open('login/resetpassword',array('class' => 'px-2 px-lg-5 '));
      ?>
        <h2 class="text-center">Forgot your Password</h2>
<div class="text-center text-secondary py-2 mb-4  ">
  <strong>Hint:&nbsp;</strong>Select a password that is easy to remember yet secure;<br>
 A minimum of 8 characters with capital letters, symbols and numbers is recommended.<br>
 Remember to use the new password for your next login
</div>
         <?php echo validation_errors(); ?>
         <div class="form-group">
           <label class="form-label font-weight-bold">New Password ( min 8 characters)</label>
          <input class="border-primary form-control" type="password" name="password"
          placeholder="Your Password(minimum 8 characters)" >
        </div>
        <div class="form-group">
          <label class="form-label font-weight-bold">Re-type New Password</label>

         <input class="border-primary form-control" type="password" name="confirm"
         placeholder="Re-type Password" >
       </div>

        <div class="form-group my-2">
          <button class="btn btn-primary btn-block font-weight-bold" type="submit">Change Password</button>
        </div>
    </form>
</div>
