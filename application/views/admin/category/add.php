<div class="container-fluid py-3 px-lg-5">
    <?php if(isset($_SESSION['feedback'])){echo '<div class="alert alert-success font-weight-bold">'.$_SESSION['feedback'].'</div>';}?>
   <?php echo validation_errors(); echo form_open('category/add'); ?>
      <h2 class="text-center py-2"><strong>Add Category.</strong></h2>
      <div class="form-group">
        <label class="font-weight-bold">Category</label>
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="name" min="3" maxlength="100" value="<?php echo set_value('name'); ?>">
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="add">Add</button></div>
</form></div>
