
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <?php

		$menuQuery = "SELECT * from menus where admin = 1 order by 'order' asc";
		$menu = $conn->query($menuQuery)->fetchAll(); 

        $currentUrl = $_SERVER['REQUEST_URI'];

        $parsedUrl = parse_url($currentUrl);

        $path = $parsedUrl['path'];

        $file = basename($path);
        
	?>
    <!-- Brand Logo -->
    <a href="index.php?page=home" class="brand-link">
        <img src="assets/images/kingsman.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KingsMan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/images/user_image.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#!" class="d-block"><?= $_SESSION["user"]->username?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <?php foreach($menu as $n): ?>
                    <li class="nav-item">
                        <a href="index.php?page=admin-<?= $n->route ?>" class="nav-link <?php if($file == $n->route):  ?> active <?php endif;  ?>">
                            <i class="<?= $n->icon ?>"></i>
                            <p><?= $n->name ?></p>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
            <a href="index.php?page=home" class="btn btn-link"><i class="fas fa-sign-out-alt"></i></a>
            <a href="models/logout.php" class="btn btn-secondary hide-on-collapse pos-right" >Log out</a>
<!-- {{--        <a href="{{ route('logout') }}" class="btn btn-secondary hide-on-collapse">Log out</a>--}}
{{--        <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>--}} -->
    </div>
    <!-- /.sidebar-custom -->
</aside>
