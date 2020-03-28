<div class="mt-lg-4">
    <h1 class="text-center">Mexico Quality</h1>

</div>
<nav class="navbar navbar-light bg-light navbar-expand-md text-primary sticky-top">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse mx-lg-5 text-center" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="<?php echo base_url("shop/index"); ?>">Home</a></li>
                    <li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="<?php echo base_url("login/contact"); ?>">Contact</a></li>
                    <li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="<?php echo base_url("login/about"); ?>">About</a></li>
                    <?php  if(isset($_SESSION['id']) && $_SESSION['role']='Admin'){
                        echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("client/view").'">Client</a></li>';
                        echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("product/view").'">Orders</a></li>';
                       echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Admins</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="'.base_url("user/create").'">New</a>
                             <a class="dropdown-item" href="'.base_url("user/view").'">Records</a>
                            </div>
                          </li>';
                      echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Products</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="'.base_url("product/addmultiple").'">New</a>
                         <a class="dropdown-item" href="'.base_url("product/view").'">Records</a>
                        </div>
                      </li>';
                    //   echo '<li class="nav-item dropdown">
                    //     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Orders</a>
                    //     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    //       <a class="dropdown-item" href="'.base_url("shop/addmultiple").'">New</a>
                    //      <a class="dropdown-item" href="'.base_url("product/view").'">Records</a>
                    //     </div>
                    //   </li>';
                    echo '<li class="nav-item font-weight-bold btn-outline-secondary"><a class="nav-link active" href="'.base_url("login/resetpassword").'">Change Password</a></li>';}?>
                     
                </ul>
    </div>
    <span class="nav-link active">
    <?php  if(isset($_SESSION['id']) && $_SESSION['role']='Admin'){
        
        echo '<a class="btn btn-info  mx-2" role="button" href="'.base_url("login/logout").'">Logout</a>';
      }else {

        echo '<a class="font-weight-bold" role="button" href="'.base_url("login/admin").'">Log In</a>';
        
      }

      ?>
    </span>
  <!-- </div> -->
    </nav>
