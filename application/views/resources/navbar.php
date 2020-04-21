<div class="row py-2 px-3">
    <div class="col-12 col-md-4 pl-md-5 ">
      <h1 class="font-weight-bold text-primary">Lamu Delivery</h1>
    </div>
    <div class="col-12 col-md-8 ">
      <div class="row align-items-center">
        <div class="col-8 pt-2">
         <?php echo form_open('shop/checkout','class="row"'); ?>
            <div class="col-10 pr-0 form-group">
              <input type="search" name="product_search" class="form-control" placeholder="Search">
            </div>
            <div class="col-2 px-0 form-group">
              <button type="submit" class="btn btn-info"><img src="<?php echo base_url().'uploads/icons/facebook.svg';?>" /></button>
            </div>

          </form>
        </div>
        <div class="col-4">
          <ul class="nav justify-content-center ">
            <li class="nav-item"><img src="<?php echo base_url().'uploads/icons/facebook.svg';?>" alt="Fb" /></li>
            <li class="nav-item"><img src="<?php echo base_url().'uploads/icons/facebook.svg';?>" alt="Tb" /></li>
          <ul>
        </div>
      </div>
      
    </div>
</div>
<nav class="navbar navbar-dark bg-primary navbar-expand-md text-white sticky-top">
  
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse mx-lg-5 text-center" id="navcol-1">
      <ul class="nav navbar-nav mr-auto">
          <li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="<?php echo base_url("shop/index"); ?>">Home</a></li>
          <li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="<?php echo base_url("login/contact"); ?>">Contact</a></li>
          <li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="<?php echo base_url("login/about"); ?>">About</a></li>
            <?php  if(isset($_SESSION['id']) && $_SESSION['role']=='Admin'){
              echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("client/view").'">Client</a></li>';
              echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("stock/view").'">Mpesa</a></li>';
              echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("shop/view").'">Orders</a></li>';
             echo '<li class="nav-item dropdown font-weight-bold">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Admins</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="'.base_url("user/create").'">New</a>
                   <a class="dropdown-item" href="'.base_url("user/view").'">Records</a>
                  </div>
                </li>';
            echo '<li class="nav-item dropdown font-weight-bold">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Products</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="'.base_url("product/addmultiple").'">New</a>
               <a class="dropdown-item" href="'.base_url("product/view").'">Records</a>
              </div>
            </li>';
            echo '<li class="nav-item dropdown font-weight-bold">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Category</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="'.base_url("category/add").'">New</a>
               <a class="dropdown-item" href="'.base_url("category/view").'">Records</a>
              </div>
            </li>';
            echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("login/resetpassword").'">Change Password</a></li>';

            }elseif(isset($_SESSION['id']) && $_SESSION['role']=='Admin'){
          echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("login/resetpassword").'">Change Password</a></li>';}?>
      </ul>
      <!-- <ul class="nav navbar-nav nav-right">
        <ul class="nav-item btn-outline-secondary text-white">Hdfs</ul>
      </ul> -->
    </div>
    <span class="nav-link active">
    <?php  if(isset($_SESSION['id']) && $_SESSION['role']=='Client'){
        echo '<a class="btn btn-outline-danger mx-2" role="button" href="'.base_url("shop/cart").'">Cart
        <span class="badge badge-danger ">'.$this->read_model->countCart().'</span></a>';
        echo '<a class="btn btn-info  mx-2" role="button" href="'.base_url("login/logout").'">Logout</a>';
      }elseif(isset($_SESSION['id']) && $_SESSION['role']=='Admin'){

        echo '<a class="btn btn-info  mx-2" role="button" href="'.base_url("login/logout").'">Logout</a>';
      }else {

        echo '<a class="font-weight-bold text-white" role="button" href="'.base_url("login/index").'">Log In</a>';
        echo '<a class="btn btn-info  mx-2" role="button" href="'.base_url("login/signup").'">Sign Up</a>';
      }

      ?>
    </span>
  <!-- </div> -->
    </nav>
