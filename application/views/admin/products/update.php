
<div class="container-fluid py-3 px-lg-5">
  <?php //print_r($edit); ?>
<?php if(isset($error)){print_r($error);} ?>
<?php if(isset($upload_data)){
  echo '<div class="alert alert-danger px-2">';
  print_r($upload_data);
  echo '</div>';} ?>
<!-- <?php if(isset($_SESSION['upload_error'])){
  echo '<div class="alert alert-danger px-2">'.$_SESSION['upload_error'].'</div>'; } ?>
  <?php if(isset($_SESSION['$upload_data'])){
    echo '<div class="alert alert-danger px-2">'.$_SESSION['upload_data'].'</div>'; } ?> -->
    <!--feedback-->
<?php if(isset($_SESSION['feedback'])){
          echo '<div class="alert alert-success px-2">'.$_SESSION['feedback'].'</div>'; } ?>
   <?php echo form_open(uri_string()); ?>
      <h2 class="text-center py-2"><strong>Add Products</strong></h2>
      <div class="form-group">
        <label class="form-label">Product Name<?php echo form_error('name'); ?></label>
        <input class="form-control" type="text" name="name" placeholder="Product Name" min="3" maxlength="100" value="<?php echo $edit[0]['name']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label">Price (Kshs.)<?php echo form_error('price'); ?></label>
        <input class="form-control" type="number" name="price" placeholder="Price in KShs" value="<?php echo $edit[0]['price']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label">Quantity<?php echo form_error('quantity'); ?></label>
        <input class="form-control" type="number" name="quantity" placeholder="Quantity" value="<?php echo $edit[0]['quantity']; ?>">
      </div>
      <div class="form-group">
          <label class="form-label font-weight-bold">Category</label>
          <select class="form-control" name="category">
          <?php $category=$this->read_model->category(); 
          foreach($category as $c){
              if($c === $edit[0]['category']){
                  echo '<option value="'.$c['id'].'" selected class="text-primary">'.$c['title'].'</option>';
              }
              echo '<option value="'.$c['id'].'">'.$c['title'].'</option>';
          }
          ?>
          </select>
      </div>
      <div class="form-group">
        <label class="form-label">Description<?php echo form_error('description'); ?></label>
        <textarea rows="8" class="form-control" name="description" placeholder="Describe your product features here.."
        ><?php echo $edit[0]['description']; ?></textarea>
      </div>
      <!-- <div class="form-group">
        <label class="form-label">Product Picture<?php echo form_error('pics[]'); ?></label>
        <input class="form-control" type="file" name="pics[]" value="<?php //echo set_value('pics[]'); ?>" multiple="multiple">
      </div> -->
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="update">Update</button></div>

</form></div>
