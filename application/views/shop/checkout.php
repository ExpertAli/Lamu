<div class="container-fluid py-2">
  <?php if(isset($_SESSION['feedback'])){
    echo '<div class="alert alert-success px-2">'.$_SESSION['feedback'].'</div>'; } ?>
  <h2 class="text-center text-info">TOTAL &nbsp; AMOUNT</h2>

<h1 class="text-center text-info font-weight-bold">Ksh.<?php  echo $this->read_model->sumCart(); ?></h1>
<h6 class="text-center">Paybill Number: 45</h6>
<div class="p-2 px-lg-5">
  <?php echo form_open('shop/checkout'); ?>
  <div class="form-group">
    <label class="form-label">Mpesa code <?php echo form_error('mpesa'); ?></label>
    <input type="text" name="mpesa" value="" placeholder="Mpesa Code" class="form-control">
  </div>
  <div class="form-group ">
    <button type="submit" name="checkout" class="btn btn-info form-control">Checkout</button>
  </div>
  </form>
</div>

</div>
