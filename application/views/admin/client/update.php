<div class="container-fluid py-3 px-lg-5">
  <?php //print_r($edit);?>
   <?php echo validation_errors(); echo form_open(uri_string()); ?>
      <h2 class="text-center py-2"><strong>Update Client.</strong></h2>
      <div class="form-group">
        <input class="form-control" type="text" name="fullname" placeholder="Fullname" min="3" maxlength="100"
        value="<?php echo $edit[0]['fullname']; ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $edit[0]['email']; ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="number" name="phonenumber" placeholder="07545" value="<?php echo $edit[0]['phone']; ?>">
      </div>

      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="signup">Submit</button></div>
</form></div>
