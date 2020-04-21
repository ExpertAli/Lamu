<div class="container-fluid px-3  py-2">
	<?php  //print_r($products);?>
	<?php //print_r($images);?>
	<div class="p-2">Categories</div>
	<?php
//	print_r($categories);
// print_r($cats);
    foreach($cats as $ct){
        echo '<div class="alert alert-primary font-weight-bold text-monospace mx-3 " id="'.$ct['title'].'">'.$ct['title'].'</div>';
        echo '<div class="row px-2 mx-auto justify-content-center">';
        foreach($products as $k){
            if($ct['category'] === $ct['category']){


                echo '<div class="card col-md-2 p-1 m-1 text-center" style="width:220px"  onclick="fire('.base_url().'shop/details/'.$k['id'].')"; >';
                echo '<img src="'. base_url().'uploads/'.$k['image_name'].'" height="200px" width="200px">';
                echo '<div class="card-body text-center bg-danger p-1">';
                // echo '<span class="font-weight-bold" >Kshs.'.$k['price'].'</span><br>';
                //  echo '<span class="font-weight-bold" >'.$k['name'].'</span>';
                 //echo $k['name'].'<br>Kshs. '.$k['price'];
                echo '<div class="row bg-success p-1">';
                    echo '<div class="col">'.$k['name'].'</div>';
                    echo '<div class="col">'.$k['price'].'</div>';
                    echo '<div class="col font-weight-bold ">'.$k['price'].'</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        echo '</div> <br>';
    }
	?>
	<div class="row px-2 mx-auto justify-content-center">
	
</div>
<script type="text/javascript">

    function fire(url){
        window.location.href=url;
    }
</script>