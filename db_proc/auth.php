<?php
session_start();  
header('Content-Type: application/json');
require '../db.php';
    
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $out = filter_input(INPUT_POST, 'out');

if(!empty($email) && !empty($password) && $out != 1){
    if($query = $db->query("SELECT * FROM users WHERE email = '{$email}';")){
        $userInfo = $query->fetch_assoc();
        $userPassword = $userInfo['password'];
        if($userPassword === $password){
            $_SESSION['auth'] = 1;
            $_SESSION['name'] = $userInfo['firstname'];
            $_SESSION['img'] = $userInfo['img'];
            $_SESSION['userId'] = $userInfo['id'];
            echo json_encode(["status"=>"ok", "msg"=>"auth complete"]);
        }
    
    }else{
       echo "неправильный емейл!!";
    }
}
if($out == 1){
    $_SESSION = array();
    $_SESSION['auth'] = 2;
    echo json_encode(["status"=>"ok", "msg"=>"out complete"]);
}
