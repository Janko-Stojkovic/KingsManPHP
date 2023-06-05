<?php
function login($userEmail, $password){
    global $conn;
    $query = "SELECT u.id as user_id, u.username, u.email, u.password, r.role_name as role from users as u inner join roles as r on u.role_id = r.id WHERE(email = :userEmail OR userName = :userEmail) AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->execute(
        [
            ":userEmail" => $userEmail,
            ":password" => $password
        ]
    );
    $result = $stmt->fetch();
    return $result;
}
function authorize(){
    if($_SESSION["user"]->role != "admin"){
        redirect("index.php");
    }
}
function redirect($url){
    header("Location:".$url);
}
