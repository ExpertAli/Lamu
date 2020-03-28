<div class="container-fluid">
    <h1 class="text-center text-info py-3">Product Records</h1>
    
    <?php
      echo validation_errors();
      echo form_open('product/search');
    ?>
<div class="row mx-auto">
        <div class="col">
           <span ><b>Search in</b></span> 
          <select class="form-control  mx-2" name="Field">
            <option selected value="name">Name</option>
            <option value="price">Price</option>
            <option value="description">description</option>
            <option value="quantity">quantity</option>
             <option value="category">category</option>
            <option value="posted">Posted Date</option>
          </select>
      </div>
      <div class="col">
          <span ><b>Search for</b></span> 
          <input type="search" name="Search" placeholder="Enter your search here" class="form-control mx-2" required>
       </div>
    <div class="col pt-2">
      <input type="submit" name="Submit" value="Search" class="btn btn-primary col mx-2" value="<?php echo set_value('Search'); ?>">
       </div>
    </div>
    <hr class="my-3">

    <div class="text-center">
    <!-- table-responsive -->
    
      <table class="mx-auto table table-borderless table-striped table-hover ">
        <thead class="thead-light">
          <tr >
            <th scope="col">Name</th>
             <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($records)){
            echo "<tr ><td colspan=\"5\">You have not item in your cart. Add products to your cart first</td></tr>";
          }?>
          <?php foreach ($records as $k): ?>
            <tr >
              <td class="font-italic" scope="row"><a href=<?=base_url('shop/details/').$k['id']?> ><?=$k['name']?></a></td>
              <td ><?=$k['title']?></td>
               <td ><?=$k['description']?></td>
               <td class=""="text-danger font-weight-bold"><?=$k['quantity']?></td>
              <td ><?=$k['price']?></td>
              <td class=""="text-danger font-weight-bold">
                  <a class="btn btn-sm btn-primary text-white" href="<?php echo base_url().'product/update/'.$k['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger text-white" href="<?php echo base_url().'product/delete/'.$k['id']; ?>">Delete</a>
              </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
        <!--<tfoot>-->

        <!--  <tr class="border border-danger">-->
        <!--    <th scope="col" colspan="3" class="text-danger">TOTAL</th>-->
            <th scope="col" colspan="2" class="text-danger">Kshs.<?php // echo $this->read_model->sumCart();?></th>
        <!--  </tr>-->
        <!--</tfoot>-->
      </table>
  </div>
</div>