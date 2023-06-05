<?php


        $errors=[];

        $rolesQuery = "SELECT * from roles";
        $roles = $conn->query($rolesQuery)->fetchAll();

        if(isset($_POST['btnSubmit'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $role = $_POST['role'];
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
                    ":role_id" => $role,
                    ":isDeleted"=>$isDeleted
                ]);
            }
        }

    ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Add new user</h1>

        <form id="userForm" action="index.php?page=create-users" method="POST" class="standard-form">
        <div class="mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username"/>
            <?= error($errors,"username","danger") ?>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email"/>
            <?= error($errors,"email","danger"); ?>

        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password"/>
            <?= error($errors,"password","danger") ?>
        </div>
        <div class="mb-3">
            <label for="password">confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" id="password" placeholder="Password"/>
            <?= error($errors,"confirmPassword","danger") ?>
        </div>
        <div class="mb-3">
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role">
                <?php foreach($roles as $r): ?>
                    <option <?php if($r->role_name === 'user'): ?> selected <?php endif; ?> value="<?= $r->id ?>"><?= $r->role_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="text-center">
            <input id="btnSubmit" name="btnSubmit" class="btn btn-primary" type="submit" value="Submit" />
            <?= error($errors,"success","success") ?>
        </div>
    </form>

    
        </section>
    </div>

</div>


    <script>
        const edit = false;
    </script>

<script>
    
     const table = "usersTable";
</script>

</body>
