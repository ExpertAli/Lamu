<div class="container-fluid py-3">
  <h1 class="text-center text-info py-2">My Orders</h1>
  <?php // print_r($mycart); ?>
  <div class="text-center">
    <!-- table-responsive -->
      <table class="mx-auto table table-borderless table-striped table-hover ">
        <thead class="thead-light">
          <tr >
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($mycart)){
            echo "<tr ><td colspan=\"5\">You have not item in your cart. Add products to your cart first</td></tr>";
          }?>
          <?php foreach ($mycart as $k): ?>
            <tr >
              <td class="font-italic" scope="row"><a href=<?=base_url('shop/details/').$k['product']?> ><?=$k['name']?></a></td>
              <td ><?=$k['quantity']?></td>
              <td ><?=$k['price']?></td>
              <td class=""="text-danger font-weight-bold"><?=$k['amount']?></td>
              <td class=""="text-danger font-weight-bold">
                <a class="btn btn-sm btn-danger text-white" href="<?php echo base_url().'shop/delete/'.$k['id']; ?>">Remove</a>
              </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
        <tfoot>

          <tr class="border border-danger">
            <th scope="col" colspan="3" class="text-danger">TOTAL</th>
            <th scope="col" colspan="2" class="text-danger">Kshs.<?php echo $this->read_model->sumCart();?></th>
          </tr>
        </tfoot>
      </table>
  </div>
  <div class="my-5">
    <a href="<?php echo base_url('shop/checkout');?>" class="btn btn-info btn-block">Checkout</a>
  </div>
</div>
