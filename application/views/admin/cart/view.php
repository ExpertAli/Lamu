<div class="container-fluid py-3">
  <h1 class="text-center text-info py-2">Orders</h1>
  <?php //print_r($orders); ?>
 
  <div class="text-center">
    <!-- table-responsive -->
    
      <table class="mx-auto table table-borderless table-striped table-hover ">
        <thead class="thead-light">
          <tr >
               <th scope="col">User</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($orders)){
            echo "<tr ><td colspan=\"5\">You have not item in your cart. Add products to your cart first</td></tr>";
          }?>
          <?php foreach ($orders as $k): ?>
            <tr >
                <td ><?=$k['fullname']?></td>
              <td class="" scope="row"><a href=<?=base_url('shop/details/').$k['product']?> ><?=$k['name']?></a></td>
              <td ><?=$k['quantity']?></td>
              <td ><?=$k['price']?></td>
              <td class="text-danger font-weight-bold"><?=$k['amount']?></td>
              <td class="text-danger font-weight-bold">
                  <a class="btn btn-sm btn-primary " href="<?php echo base_url().'shop/update/'.$k['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-outline-danger text-danger" href="<?php echo base_url().'shop/delete/'.$k['id']; ?>">Remove</a>
              </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
        <!--<tfoot>-->

        <!--  <tr class="border border-danger">-->
        <!--    <th scope="col" colspan="3" class="text-danger">TOTAL</th>-->
        <!--    <th scope="col" colspan="2" class="text-danger">Kshs.<?php echo $this->read_model->sumCart();?></th>-->
        <!--  </tr>-->
        <!--</tfoot>-->
      </table>
  </div>
  
</div>
