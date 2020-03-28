<div class="container-fluid">
  
<?php echo validation_errors(); ?>
<div class="row py-3 px-2 bg-light">
  <?php // print_r($products); 
  //print_r($images);
   //foreach($images as $img){ print_r($img); }?>
  
  <div class="col text-center">
      <?php  
          $cnt = count($images);
          if($cnt > 1){
              echo '<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="8000">';
              echo '<ol class="carousel-indicators">';
              for($i=0; $i < $cnt;$i++){
                  if($i == 0){
                      echo '<li data-target="#carousel" data-slide-to="0" class="active"></li>';
                  }else{
                      echo '<li data-target="#carousel" data-slide-to="'.$i.'"></li>';
                  }
              }
              echo '</ol>';
              echo '<div class="carousel-inner">';
           
              for($i=0;$i < $cnt; $i++){
                  if($i < 1){
                      echo '<div class="carousel-item active">';
                      
                  }else{ echo '<div class="carousel-item ">';}
                  echo '<img src="'.base_url().'uploads/'.$images[$i]['image_name'].'" alt="Image '.$i.'" height="400"/>';
                  echo '</div>';
              }
            
              echo '</div>';
              echo '<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>'; 
  echo '<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>';
              echo '</div>';
            //   echo '<div id="piccarousel" class="carousel slide" data-ride="carousel">';
            //   echo '<ol class="carousel-indicators">';
            //  for($i=0;$i < $cnt; $i++){
            //      if($i == 0){
            //           echo '<li data-target="#piccarousel" data-slide-to="'.$i.'" class="active"></li>';
            //      }
            //      echo '<li data-target="#piccarousel" data-slide-to="'.$i.'"></li>';
            //  }
            
            //   echo '</ol>';
            //   echo '<div class="carousel-inner">';
            //   echo '<div class="carousel-item active">
            //   <img class="d-block w-100" src="" alt="Image" height="300"></div>';
            //   foreach($images as $img){
            //       echo '<div class="carousel-item active">
            //   <img class="d-block w-100" src="'.base_url().'uploads/'.$img['image_name'].'" alt="Image" height="300">
            // </div>';
            //   }
            
            //  for($i=0;$i < $cnt; $i++){
            //      $active="";
            //      if($i == 0){ $active="active"; }
            //     echo '<div class="carousel-item '.$active.'">
            //  <img class="w-25" src="'.base_url().'uploads/'.$images[$i]['image_name'].'" alt="Image" height="300">';
                 
            //  }
        //       echo '</div>';
        //       echo '<a class="carousel-control-prev" href="#piccarousel" role="button" data-slide="prev">
        //         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        //         <span class="sr-only">Previous</span>
        //       </a>';
        //       echo '<a class="carousel-control-next" href="#piccarousel" role="button" data-slide="next">
        //     <span class="carousel-control-next-icon" aria-hidden="true"></span>
        //     <span class="sr-only">Next</span>
        //   </a>';
              echo '</div>';
          }else{
            //   print_r($images);
              echo '<img src="'.base_url().'uploads/'.$images[0]['image_name'].'" height="300"/>';
          }
          
  ?>
  </div>
  <div class="col">
    <h2 class="py-3"><?php echo $products[0]['name'];?></h2>

    <h4 class="text-danger">Kshs.&nbsp;<?php  echo $products[0]['price'];?></h4>
    <p class="text-dark"><?php echo $products[0]['description'];?> </p>
<?php echo form_open('shop/addcart')?>
    <div class="row">

      <div class="col-1 pt-1">Qty:</div>
       <div class="col-3">
           <input type="number" class="form-control" name="quantity" value="1">
           <input type="number" name="product_id" value="<?php echo $products[0]['id'];?>" hidden>
       </div>
       <div class="col-5"><input type="submit" class="btn btn-warning" name="cart" value="Add to Cart"></div>

    </div></form>
  </div>
</div>
