<div class="containe-fluid px-3 ">
	<!-- <div class="row">
		<div class="col-lg-3 d-none d-lg-block">
			<ul class="list-group">
				<li class="list-group-item btn btn-outline-primary">Furnitures</li>
			</ul>
		</div>
		<div class="col-lg-8">
			Home Some quick example text to build on the card title and make up the bulk of the card's content.
		</div>
	</div> -->
	<!-- products -->
	<h2 class="text-info text-center">Products</h2>
	<?php  //print_r($products);?>
	<?php //print_r($images);?>
	<hr>
	<?php 
//	print_r($categories);
// print_r($cats);
    foreach($cats as $ct){
        echo '<div class="alert alert-primary font-weight-bold text-monospace mx-3 sticky-top" id="'.$ct['title'].'">'.$ct['title'].'</div>';
        echo '<div class="row px-2 mx-auto justify-content-center">';
        foreach($products as $k){
            if($ct['category'] === $ct['category']){
                echo '<div class="card col-md-2 px-0 m-1 text-center" >';
                echo '<img src="'. base_url().'uploads/rsz_'.$k['image_name'].'" height="200px" width="200px">';
                echo '<div class="card-body p-0 text-center">';
                echo '<a href="'.base_url().'shop/details/'.$k['id'].'"
						class="btn btn-outline-dark btn-block font-weight-bold">
						'.$k['name'];?><br />Kshs.<?php echo $k['price'].'</a>';
				echo '</div>';
				echo '</div>';
            }
        }
        echo '</div>';
    }
	?>
	<div class="row px-2 mx-auto justify-content-center">
	<?php //$categories=array_unique($products[0]['category']); print_r($categories);?>
	
	<!--<?php foreach ($products as $k): ?>-->
	<!--	<div class="card col-md-3 px-0 m-1" >-->
	<!--	    <img src="<?php echo base_url().'uploads/'.$k['image_name'];?>" height="200px" >-->
	<!--			<div class="card-body p-0 text-center">-->
	<!--				<a href="<?php echo base_url().'shop/details/'.$k['id']; ?>"-->
	<!--					class="btn btn-outline-dark btn-block font-weight-bold">-->
	<!--					<?php echo $k['name'];?><br />Kshs.<?php echo $k['price'];?></a>-->
	<!--			</div>-->
	<!--	</div>-->
 <!--   <?php endforeach; ?>-->
    </div>
</div>