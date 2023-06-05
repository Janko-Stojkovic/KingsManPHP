<?php
        $errors=[];

        $rolesQuery = "SELECT * from roles";
        $roles = $conn->query($rolesQuery)->fetchAll();

        $usersQuery = "SELECT u.id, u.username, u.email, u.password, u.role_id, r.id from users as u join roles as r on u.role_id = r.id WHERE u.id = :id";
        $idUser = $_GET['userId'];
        $stmt = $conn->prepare($usersQuery);
        $stmt->bindParam(":id", $idUser);
        $stmt->execute();
        $user = $stmt->fetch();

        
        if(isset($_POST['btnSubmit'])){
            $userId = $_POST['userId'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $confirmPassword = $_POST['confirmPassword'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            
            

                if($_POST['confirmPassword'] != $_POST['password']){
                    $errors['confirmPassword'] = "Passwords do not match";
                }
                else if(!trim($password)){
                    $errors['password'] = "Password field can`t be empty";
                }
                else if(!trim($username)){
                    $errors['username'] = "Username field can`t be empty";
                }
                else if(!trim($email)){
                    $errors['email'] = "Email field can`t be empty";
                }
                
                if(count($errors) == 0){


                    $query = "";

                    if(isset($password) && !trim($password)){
                        $query = "UPDATE users SET username = :username, password = :password, email = :email, role_id = :roleId WHERE id = :id";
                    }
                    else {
                        $query = "UPDATE users SET username = :username, email = :email, role_id = :roleId WHERE id = :id";
                    }
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":id", $userId);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":roleId", $roleId);
                    if(isset($password) && !trim($password)){
                        $stmt->bindParam(":password", $password);
                    }
                    $stmt->execute();
                    $errors['success'] = "User is successfully updated";
                }
        }
        
    ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Edit user</h1>

        <form id="userForm" action="<?= $_SERVER["REQUEST_URI"]?>" method="POST" class="standard-form">
        <input type="hidden" name="userId" value="<?= $user->id ?>">
        <div class="mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?= $user->username ?>" id="username" placeholder="Username"/>
            <?= error($errors,"username","danger") ?>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?= $user->email ?>" placeholder="Email"/>
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
                    <option <?php if($r->id == $user->role_id): ?> selected <?php endif; ?> value="<?= $r->id ?>"><?= $r->role_name ?></option>
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
