<?php

	$menuQuery = "SELECT * from menus where admin = 0";
	$menu = $conn->query($menuQuery)->fetchAll(); 

?>

<section class="w3l-footer-22" id="footer">
	<!-- footer-22 -->
	<div class="footer-hny py-5">
		<div class="container py-lg-5">
			<div class="text-txt row">
				<div class="left-side col-lg-4">
					<h3><a class="logo-footer" href="index.php">
					  kings<span class="lohny">man</span> Watches</a>
					<!-- if logo is image enable this   
								  <a class="navbar-brand" href="#index.php">
									  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
								  </a> -->
					
					<ul class="social-footerhny mt-lg-5 mt-4">

						<li><a class="facebook" href="https://www.facebook.com/"><span class="fa fa-facebook" aria-hidden="true"></span></a>
						</li>
						<li><a class="twitter" href="https://www.twitter.com/"><span class="fa fa-twitter" aria-hidden="true"></span></a>
						</li>
						<li><a class="google" href="https://www.linkedin.com/"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
						</li>
						<li><a class="instagram" href="https://www.instagram.com/"><span class="fa fa-instagram" aria-hidden="true"></span></a>
						</li>
					</ul>
					<ul class="social-footerhny mt-lg-5 mt-4">

					  <li><a class="facebook" href="assets/xml/rss.xml"><span class="fa fa-rss-square" aria-hidden="true"></span></a>
					  </li>
					  <li><a class="twitter" href="assets/xml/sitemap.xml"><span class="fa fa-sitemap" aria-hidden="true"></span></a>
					  </li>
					  <li><a class="google" href="assets/doc/documentation.pdf"><span class="fa fa-file-pdf-o" aria-hidden="true"></span></a>
					  </li>
					  <li><a class="instagram" href="https://trovo.live/Pipiit"><span class="fa fa-tv" aria-hidden="true"></span></a>
					  </li>
				  </ul>
				</div>

				<div class="right-side col-lg-8 pl-lg-5">
					<h4>Women's Day Special Offer
					  All Branded Sandals are Flat 50% Discount</h4>
					<div class="sub-columns">
						<div class="sub-one-left">
							<h6>Useful Links</h6>
							<div class="footer-hny-ul">
								<ul>
									<?php foreach($menu as $m): ?>
										<li><a href="index.php?page=<?= $m->route ?>"><?= $m->name ?></a></li>
									<?php endforeach; ?>
								</ul>
								<button id="open-author" class="btn btn-primary">Author</button>
							</div>

						</div>
						<div class="sub-two-right">
							<h6>Our Store</h6>
							<p class="mb-5">Zdravka Celara 16, 11000 Beograd</p>

							<h6>We accept:</h6>
							<ul>
								<li><a class="pay-method" href="#"><span class="fa fa-cc-visa"
											aria-hidden="true"></span></a>
								</li>
								<li><a class="pay-method" href="#"><span class="fa fa-cc-mastercard"
											aria-hidden="true"></span></a>
								</li>
								<li><a class="pay-method" href="#"><span class="fa fa-cc-paypal"
											aria-hidden="true"></span></a>
								</li>
								<li><a class="pay-method" href="#"><span class="fa fa-cc-amex"
											aria-hidden="true"></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="below-section row">
				<div class="columns col-lg-6">
					<ul class="jst-link">
						<li><a href="#">Privacy Policy </a> </li>
						<li><a href="#">Term of Service</a></li>
						<li><a href="index.php?page=contact">Customer Care</a> </li>
					</ul>
				</div>

				<button onclick="topFunction()" id="movetop" title="Go to top">
					<span class="fa fa-angle-double-up"></span>
				</button>
			</div>
		</div>
	</div>
	<div class="modal-author" id="modal-author">
	  <div class="container">
		  <div class="row">
			  <div class="left">
				  <img src="assets/images/ja.JPG" alt="My picture"/>
			  </div>
			  <div class="right">
				  <div class="right-title">
					  <h4 class="card-title">Author</h4>
				  </div>
				  <div class="right-body">
					  <p>Hi! My name is Janko Stojkovic (96/20). I went to the "First technical school" in Kragujevac. My desire for programming came in my first year of high school when I actually first came in contact with c and c #. A year later I was introduced to web programming and web design. I learned HTML, CSS and JAVASCRIPT, I am also familiar with PHP.
						  In the meantime a friend told me about ICT college, so I decided it was the best decision I could make. With a high school diploma, I came to Belgrade to continue my education and expand my knowledge of web development. I am a freshman at the moment and I hope that everything will go well.</p>
				  </div>
			  </div>
		  </div>
		  <div class="row buttons">
			  <a href="https://janko-stojkovic.github.io/Portfolio/" target="_blank" class="author-button portfolio">Portfolio</a>
			  <button  class="author-button" id="close">Close</button>
		  </div>
	  </div>
  </div>
  <div id="overlay"></div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/b246e96d93.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
</body>
</html>