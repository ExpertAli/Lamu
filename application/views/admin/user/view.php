<div class="container-fluid bg-light ">
<?php // print_r($records); ?>
  <h1 class="text-center text-primary py-3">User Records</h1>
    <?php
      echo validation_errors();
      echo form_open('user/search');
    ?>

    <div class="row mx-auto">
        <div class="col">
           <span ><b>Search in</b></span> 
          <select class="form-control  mx-2" name="Field">
            <option selected value="fullname">Fullname</option>
            <option value="email">Email</option>
            <option value="execution">Posted Date</option>
          </select>
      </div>
      <div class="col">
          <span ><b>Search for</b></span> 
          <input type="search" name="Search" placeholder="Enter your search here" class="form-control mx-2" required>
       </div>
    <div class="col pt-2">
      <input type="submit" name="Submit" value="Search" class="btn btn-primary col mx-2">
       </div>
    </div>


    <hr class="my-3">

 <table class="table  mx-2 mx-lg-5">
    <!-- <legend>Client Records</legend> -->
    <caption>Client Records</caption>
    <thead class="thead-dark">
      <tr >
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
        <th scope="col">Posted</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        <?php foreach ($records as $p): ?>
          
        <td scope="row"><?php echo $p['fullname']; ?></td>
        <td><?php echo $p['email']; ?></td>
        <td><?php echo $p['posted']; ?></td>
        <td>
         <td>
          <a class="btn btn-success btn-sm" href="<?php echo base_url('user/update/'.$p['id']); ?>"> Update </a>
          <a class="btn btn-danger btn-sm" href="<?php echo base_url('user/delete/'.$p['id']); ?>"> Delete </a>
        </td>
        </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
    
  </table>
</div>
