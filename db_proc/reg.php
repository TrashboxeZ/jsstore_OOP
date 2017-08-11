<?php
    header('Content-Type: application/json');
    require'../db.php';
    
    $name = filter_input(INPUT_POST, 'name');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $age = filter_input(INPUT_POST, 'age');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    if($query = $db->reg($name, $lastname, $email, $password, $age)){
        echo json_encode(["status"=>"ok", "msg"=>"registration complete"]);
    }else{
        echo json_encode(["status"=>"error", "msg"=>"registration not complete"]);
    }

