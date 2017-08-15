<?php
session_start();  
header('Content-Type: application/json');
require '../db.php';
    
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $out = filter_input(INPUT_POST, 'out');

if(!empty($email) && !empty($password)){
    if($query = $db->auth($email, $password)){
        $_SESSION['auth'] = 1;
            foreach($query as $key=>$value){
                $_SESSION[$key] = $value;
//            $_SESSION['name'] = $query['firstname'];
//            $_SESSION['img'] = $query['img'];
//            $_SESSION['userId'] = $query['id'];
//            $_SESSION['email'] = $query['email'];
            }
            echo json_encode(["status"=>"ok", "msg"=>"auth complete"]);
        }
    else{
       echo "неправильный емейл!!";
    }
}
if($out == 1){
    $_SESSION = array();
    unset($_SESSION['auth']);
    echo json_encode(["status"=>"ok", "msg"=>"out complete"]);
}
