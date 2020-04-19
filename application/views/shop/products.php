<div class="container-fluid px-3 ">
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
	<h2>Products</h2>
	<?php // print_r($products);?>
	<?php //print_r($images);?>
	<hr>
	<div class="row px-2 mx-auto justify-content-center">
		<!-- <div class="card col-3">
			  <img src="<?php echo base_url().'uploads/bk.jpg';?>" class="card-img-top" alt="...">

			  <div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="<?php echo base_url('shop/details'); ?>" class="btn btn-primary">Go somewhere</a>
			  </div>
		</div> -->
		<!-- <div class="card col-3 px-0 m-1" >
			  <img src="<?php echo base_url().'uploads/bk.jpg';?>" height="200px">
			  <div class="card-body p-0 text-center">
			    <a href="<?php echo base_url('shop/details'); ?>" class="btn btn-light btn-block font-weight-bold">Coffee Table<br />Kshs. &nbsp; 3500</a>
			  </div>
	</div> -->
	<?php foreach ($products as $k): ?>
		<div class="card col-lg-3 px-0 m-1" >
		    <img src="<?php echo base_url().'uploads/'.$k['image_name'];?>" height="200px" >
				<div class="card-body p-0 text-center">
					<a href="<?php echo base_url().'shop/details/'.$k['id']; ?>"
						class="btn btn-outline-dark btn-block font-weight-bold">
						<?php echo $k['name'];?><br />Kshs.<?php echo $k['price'];?></a>
				</div>
		</div>
<?php endforeach; ?>
</div>
