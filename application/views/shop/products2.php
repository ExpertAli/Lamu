<div class="container-fluid px-3  py-2">
	<?php  //print_r($products);?>
	<?php //print_r($images);?>
	
	<?php
//	print_r($categories);
// print_r($cats);
    foreach($cats as $ct){
        echo '<div class="alert alert-primary font-weight-bold text-monospace mx-3 " id="'.$ct['title'].'">'.$ct['title'].'</div>';
        echo '<div class="row px-2 mx-auto justify-content-center">';
        foreach($products as $k){
            if($ct['category'] === $ct['category']){
    //             echo '<div class="card col-md-2 px-0 m-1 text-center" >';
    //             echo '<img src="'. base_url().'uploads/rsz_'.$k['image_name'].'" height="200px" width="200px">';
    //             echo '<div class="card-body p-0 text-center">';
    //             echo '<a href="'.base_url().'shop/details/'.$k['id'].'"
				// 		class="btn btn-outline-dark btn-block font-weight-bold">
				// 		'.$k['name'];?><br />Kshs.<?php // echo $k['price'].'</a>';
				// echo '</div>';
				// echo '</div>';

              

                echo '<div class="card col-md-2 p-1 m-1 text-center"  onclick="fire('.base_url().'shop/details/'.$k['id'].')"; >';
                echo '<img src="'. base_url().'uploads/'.$k['image_name'].'" height="200px" width="300px">';
                echo '<div class="card-body text-center font-weight-bold">';
                // echo '<span class="font-weight-bold" >Kshs.'.$k['price'].'</span><br>';
                //  echo '<span class="font-weight-bold" >'.$k['name'].'</span>';
                 echo $k['name'].'<br>Kshs. '.$k['price'];
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