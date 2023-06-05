<section class="hero" id="hero">
	<?php
    include "config/session.php";
    include "config/connection.php";
		$menuQuery = "SELECT * from menus where admin = 0 order by 'order'";
		$menu = $conn->query($menuQuery)->fetchAll();

        if (isset($_GET['page'])) {
            $pageName = $_GET['page'];
            switch ($_GET["page"]) {
                case "login":
                    $background = "bg-pic.jpg";
                    $video = "bg-video.mp4";
                    break;
                case "home":
                    $heroText = "Long-Standing";
                    $heroTextStrong = "Legacy";
                    $background = "bg-pic.jpg";
                    $video = "bg-video.mp4";
                    break;
                case "about":
                    $heroText = "About Our";
                    $heroTextStrong = "Company";
                    $background = "bg2.jpg";
                    break;
                case "contact":
                    $heroText = "Contact";
                    $heroTextStrong = "Us";
                    $background = "bg4.jpg";
                    break;
                case "shop":
                    $heroText = "Look At Our";
                    $heroTextStrong = "Shop";
                    $background = "bg3.jpg";
                    break;
                case "cart":
                    $heroText = "This Is Your";
                    $heroTextStrong = "Cart";
                    $background = "bg4.jpg";
                    break;

                default:
                    $heroText = "";
                    $heroTextStrong = "";
                    $background = "bg2.jpg";
                    break;
            }
        }
        else
        {
            $heroText = "Long-Standing";
            $heroTextStrong = "Legacy";
            $background = "bg-pic.jpg";
            $video = "bg-video.mp4";
        }
	?>
			<nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container">
						<a class="navbar-brand" href="index.php?page=home">
							<strong><span class="logo">Kingsman</span> <span class="logo2">Watches</span></strong>
						</a>

						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav mx-auto" id="menu">
								<?php foreach($menu as $m): ?>
									<li class="nav-item active">
										<a class="nav-link" href="index.php?page=<?= $m->route ?>"><?= $m->name ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
							<?php if(isset($_SESSION["user"])): ?>
							<span class="cart ms-3 me-3">
                                <a href="index.php?page=cart" class="cart-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="number"></span>
                                </a>
							</span>
							
							
                            <span class="ms-3 me-3 dropdown">

								<?= $_SESSION["user"]->username ?>

                                <div class="dropdown-content flex-column">

                                   <?php if($_SESSION["user"]->role == "admin"): ?>
                                    <a href="index.php?page=admin-dashboard" class="cart-icon">
                                        Admin Panel
                                    </a>
									<?php endif; ?>
									<a href="models/logout.php" class="cart-icon">
										Logout
									</a>
                                </div>
                            </span>
							<?php else: ?>
                        	<a href="index.php?page=login" class="ms-3 me-3 dropdown">
                	            Login
                            </a>
							<?php endif; ?>

						</div>
                </div>
            </nav>
			<div class="heroText">
				<h1 class=" mt-5 mb-lg-4 class-font" data-aos="zoom-in" data-aos-delay="50">
					Kingsman Watches
				</h1>

				<p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="100">
					<?= $heroText ?><strong class="custom-underline"> <?= $heroTextStrong ?></strong>
				</p>
			</div>


			<div class="videoWrapper">
				<video autoplay="" loop="" muted="" class="custom-video" poster="assets/images/videos/<?= $background ?>">
					<source src="assets/images/videos/<?= $video ?>" type="video/mp4">
				</video>
			</div>

			<div class="overlay">
			</div>
			
		</section>