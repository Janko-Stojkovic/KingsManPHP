<?php

	$homeProductsQuery = "SELECT * from home_products as hp inner join brands as b on hp.brandId = b.id";
	
	$homeProducts = $conn->query($homeProductsQuery)->fetchAll();

	$customersQuery = "SELECT * from customers";

	$customers = $conn->query($customersQuery)->fetchAll();



 ?>
<!-- //w3l-banner-slider-main -->
<section class="w3l-grids-hny-2">
	<!-- /content-6-section -->
	<div class="grids-hny-2-mian py-5">
		<div class="container py-lg-5">
				
			<h3 class="hny-title mb-0 text-center" data-aos="zoom-in" data-aos-delay="50">Shop With <span>Us</span></h3>
			<p class="mb-4 text-center" data-aos="zoom-in" data-aos-delay="100">Most Popular Brands</p>
			
			<div class="welcome-grids row mt-5" data-aos="zoom-in" data-aos-delay="50">
				<?php foreach($homeProducts as $hp): ?>

					<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
							<a href="#URL">
									<img src="assets/images/<?= $hp->image?>" class="img-fluid" alt="" />
								<div class="boxhny-content">
									<h3 class="title"><?= $hp->brandName ?>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- //content-6-section -->

<section class="w3l-content-w-photo-6" data-aos="fade-in" data-aos-delay="50">
	<!-- /specification-6-->
	  <div class="content-photo-6-mian py-5">
			 <div class="container py-lg-5">
					<div class="align-photo-6-inf-cols row">
						
						<div class="photo-6-inf-right col-lg-6">
								<h3 class="hny-title text-left">All Rolex Men's Watches are <span>15% to 75% Discount</span></h3>
								<p>Visit our shop to see amazing creations from our designers.</p>
								<a href="index.php?page=shop" class="read-more btn">
										Shop Now
								</a>
						</div>
						<div class="photo-6-inf-left col-lg-6">
								<img src="assets/images/bg4.jpg" class="img-fluid" alt="">
						</div>
					</div>
				 </div>
			 </div>
	 </section>
   <!-- //specification-6-->
     
<section class="w3l-video-6" data-aos="fade-in" data-aos-delay="50">
	<!-- /video-6-->
	<div class="video-66-info">
		<div class="container-fluid">
			<div class="video-grids-info row">
				<div class="video-gd-right col-lg-8">
					
				  </div>
				<div class="video-gd-left col-lg-4 p-lg-5 p-4">
					<div class="p-xl-4 p-0 video-wrap">
						<h3 class="hny-title text-left">All Branded Women's Watches are  <span>15% to 75% Discount</span>
						</h3>
						<p>Visit our shop to see amazing creations from our designers.</p>
						<a href="index.php?page=shop" class="read-more btn">
							Shop Now
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- //video-6-->

<!-- //products-->

<!-- //content-6-section -->

<!-- //post-grids-->
<section class="w3l-customers-sec-6" data-aos="fade-in" data-aos-delay="50">
	<div class="customers-sec-6-cintent py-5">
		<!-- /customers-->
		<div class="container py-lg-5">
				<h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
				<p class="mb-5 text-center">What People Say</p>
			<div class="row customerhny my-lg-5 my-4">
				<div class="owl-carousel owl-theme owl-reponsive">
					<?php foreach($customers as $c): ?>
					<div class="item">
						<div class="customer-info text-center">
							<div class="feedback-hny">
							<span class="fa fa-quote-left"></span>
								<p class="feedback-para"><?= $c->feedback ?></p>
							</div>
							<div class="feedback-review mt-4">
								<img src="assets/images/<?= $c->image ?>" style="width: 34%;" class="img-fluid" alt="">
								<h5><?= $c->name ?></h5>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //customers -->

<!-- //customers-6-->







