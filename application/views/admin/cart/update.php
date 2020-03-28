<!--//should create a new function to pick only the id and fullname  from client table && product name and price from products table instead fetching all the columns from each table-->
<?php // print_r($edit); ?>
<?php // print_r($clients); ?>
<?php //print_r($products); ?>
<?php // print_r($this->read_model->specific($edit[0]['user'], 'client')); ?>
<div class="container-fluid">
    <?php echo form_open(uri_string()); ?>
    <h2 class="text-center py-2"><strong>Edit Cart</strong></h2>
    <!--clients details-->
      <div class="form-group">
        <label class="form-label font-weight-bold">Client Name<?php echo form_error('name'); ?></label>
        <select name="user" class="form-control">
            <?php 
            $cntClient=count($clients);
            
            for($i=0; $i < $cntClient; $i++){
                if($i == $edit[0]['user']){
                    echo '<option value="'.$clients[$i]['id'].'" selected>'.$clients[$i]['fullname'].'</option>';
                    continue;
                }
                echo '<option value="'.$clients[$i]['id'].'">'.$clients[$i]['fullname'].'</option>';
            }
            ?>
        </select>
      </div>
      <!--product details-->
      <div class="form-group">
        <label class="form-label font-weight-bold">Product Name<?php echo form_error('name'); ?></label>
        <select name="product_id" class="form-control">
            <?php 
            $cntProduct=count($products);
            
            for($i=0; $i < $cntProduct; $i++){
                if($i == $edit[0]['product']){
                    echo '<option value="'.$products[$i]['id'].'" selected>'.$products[$i]['name'].'&nbsp; @'.$products[$i]['price'].'</option>';
                    continue;
                }
                echo '<option value="'.$products[$i]['id'].'">'.$products[$i]['name'].'&nbsp; @'.$products[$i]['price'].'</option>';
            }
            ?>
        </select>
      </div>
      <!--quantity cart-->
       <div class="form-group">
        <label class="form-label font-weight-bold">Quantity <?php echo form_error('quantity'); ?></label>
        <input class="form-control" type="number" name="quantity" placeholder="Quantity" value="<?php echo $edit[0]['quantity']; ?>">
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" name="update">Update</button></div>
    </form>
</div>