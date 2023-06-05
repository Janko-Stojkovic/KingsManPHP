<?php
$errors = [];
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $role_id = 1;
    $isDeleted = 0;
    $emailQuery = "SELECT * from users WHERE email = :email AND isDeleted = 0";
    $stmt = $conn->prepare($emailQuery);
    $stmt->execute(
        [
            ":email" => $email
        ]
    );
    $userEmail = $stmt->fetch();
    $usernameQuery = "SELECT * from users WHERE username = :username AND isDeleted = 0";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->execute(
        [
            ":username" => $username
        ]
    );

    $userUsername = $stmt->fetch();
    if($userUsername){
        $errors['username'] = "Username is already taken";
    }
    else if(!trim($username)){
        $errors['username'] = "Username field can`t be empty";
    }
    if($userEmail){
        $errors['email'] = "Email is already taken";
    }
    else if(!trim($email)){
        $errors['email'] = "Email field can`t be empty";
    }
    else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Email is not valid";
        }
    }
    if($_POST['confirmPassword'] != $_POST['password']){
        $errors['confirmPassword'] = "Passwords do not match";
    }
    else if(!trim($password)){
        $errors['password'] = "Password field can`t be empty";
    }
    else if(!trim($_POST['confirmPassword'])){
        $errors['confirmPassword'] = "Confirm password field must match with password field";
    }
    else{

    };

    if(count($errors)!=0){
        echo "";
    }
    else{
        $errors['success']="You registered successfully";
        $insertUserQuery = "INSERT INTO users (username, email, password, role_id, isDeleted) VALUES (:username, :email, :password, :role_id, :isDeleted)";
        $stmt = $conn->prepare($insertUserQuery);
        $stmt->execute([
            ":username" => $username,
            ":email" => $email,
            ":password" => $password,
            ":role_id" => $role_id,
            ":isDeleted"=>$isDeleted
        ]);
    }

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
                <form class="loginForm" action="index.php?page=register" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-5">
                            <input type="text" id="inputName" name="username" class="form-control" placeholder="Username" autofocus>
                            <?= error($errors,"username","danger"); ?>
                        </div>
                        <div class="form-outline mb-5">
                            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus>
                            <?= error($errors,"email","danger"); ?>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-5">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                            <?= error($errors,"password","danger"); ?>
                        </div>
                        <div class="form-outline mb-5">
                            <input type="password" class="form-control font-small" id="confirmPassword" name="confirmPassword" placeholder="Confirm password"/>
                            <?= error($errors,"confirmPassword","danger"); ?>
                        </div>

                        <!-- 2 column grid layout for inline styling -->

                        <!-- Submit button -->
                        <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Register"/>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Already have an account?<a href="index.php?page=login"> Log in</a></p>
                        </div>

                        <?= error($errors,"success","success"); ?>
                        
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

