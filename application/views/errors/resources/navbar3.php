<!-- Start: Navigation with Button -->
<div>
    <nav class="navbar navbar-light bg-light navbar-expand-md text-primary ">
        <div class="container">
            <a class="navbar-brand btn font-weight-bold" href="<?php echo base_url("login/index"); ?>" ><b>Mexico Shop</b></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse mx-lg-5 text-center" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo base_url("login/index"); ?>">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url("login/contact"); ?>">Contact</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url("login/about"); ?>">About</a></li>
                    <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Dropdown </a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a><a class="dropdown-item"
                                role="presentation" href="#">Menu Item</a></div>
                    </li>
                </ul>
                <span class="nav-link active"> <a href="<?php echo base_url("login/index"); ?>" class="font-weight-bold">Log In</a><a class="btn btn-info  mx-2" role="button" href="<?php echo base_url("login/signup"); ?>">Sign Up</a></span></div>
    </div>
    </nav>
</div>
<!-- <div class="container-fluid bg-light py-3  text-center"><form method="post" action="" class="row">
    <div class="col"><input type="search" name="search" class="form-control ml-5" placeholder="Search" /></div>
    <div class="col"><input type="submit" name="btnSearch" class="btn btn-primary" value="Search"/></div>
</form></div> -->

<!-- End: Navigation with Button -->