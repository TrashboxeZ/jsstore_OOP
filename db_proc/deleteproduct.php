<?php
    header('Content-Type: application/json');
    require '../db.php';

    $id = filter_input(INPUT_POST, 'id');
//    $id = $db->$connection->real_escape_string($id);
//    $id = 3;
//    echo $id;

    
    if($query =  $db->delete("products",$id)){
    
        echo json_encode([ "status" => "delete", "msg" => "delete" ]);
        
    }    
    else{

        echo json_encode([ "status" => "error", "msg" => "not delete!" ]);

    };
