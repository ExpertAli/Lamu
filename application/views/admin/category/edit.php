<div class="container-fluid py-3 px-lg-5">
  <?php // print_r($edit);?>
  <?php if(isset($_SESSION['feedback'])){
          echo '<div class="alert alert-success px-2">'.$_SESSION['feedback'].'</div>'; } ?>
   <?php echo validation_errors(); echo form_open(uri_string()); ?>
      <h2 class="text-center py-2"><strong>Update Category.</strong></h2>
       <div class="form-group">
        <label>Category</label>
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="category name" min="3" maxlength="100"
        value="<?php echo $edit[0]['title']; ?>">
       
      </div>
     

      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="edit">Update</button></div>
</form></div>
