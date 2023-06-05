<?php
$error = "";
if(isset($_POST["btnLogin"])){
    $userEmail = $_POST["userEmail"];
    $password = md5($_POST["password"]);
    $user = login($userEmail, $password);
    $loginTime = GETDATE();
    $loginFormat = $loginTime['year'] . '-' . $loginTime['mon'] . '-' . $loginTime['mday'] . ' ' . $loginTime['hours'] . ':' . $loginTime['minutes'] . ':' . $loginTime['seconds'];
    if(!$user){
        $error = "There is no user with that username or password";
    }
    else{
        $_SESSION["user"] = $user;
        echo "<script>window.location.href='index.php?page=shop'</script>";
        $query = "INSERT INTO loginlogs (user_id,Login_Time) Values (:user_id,:loginTime)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
                ":user_id"=>$user->user_id,
                ":loginTime"=>$loginFormat
        ]);

    }
}
if(isset($_SESSION["user"])){
    echo "<script>window.location.href='index.php?page=home'</script>";
}
?>
<section class="w3l-banner-slider-main">
    <div class="top-header-content">
        <section class="hero" id="hero">
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php?page=home">
                        <strong><span class="logo">Kingsman</span> <span class="logo2">Watches</span></strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="heroText">
                <div class="container w-50">
                    
                    <form class="loginForm" action="index.php?page=login" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-5">
                            <input type="text" id="inputEmail" name="userEmail" class="form-control" placeholder="Email address or Username">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-5">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                        </div>

                        <!-- 2 column grid layout for inline styling -->

                        <!-- Submit button -->
                        <input name="btnLogin" type="submit" class="btn btn-primary btn-block mb-4" value="Log in"/>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="index.php?page=register">Register here</a></p>
                        </div>
                        <?php if($error): ?>
                            <div class="alert alert-danger">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                    </form>
                </div>
            </div>


            <div class="videoWrapperLogin">
                <video autoplay="" loop="" muted="" class="custom-video" poster="assets/images/videos/bg-pic.jpg">
                    <source src="assets/images/videos/bg-video.mp4" type="video/mp4">
                </video>
            </div>

            <div class="overlay">
            </div>

        </section>
        <!--/nav-->

        <!--//nav-->
    </div>
</section>

