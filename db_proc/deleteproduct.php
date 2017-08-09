<?php
    header('Content-Type: application/json');
    require '../db.php';

    $id = filter_input(INPUT_POST, 'id');
    $table = filter_input(INPUT_POST, 'table');
//    $id = $db->$connection->real_escape_string($id);
//    $id = 3;
//    echo $id;

    
    if($query =  $db->delete($table,$id)){
    
        echo json_encode([ "status" => "delete", "msg" => "delete" ]);
        
    }    
    else{

        echo json_encode([ "status" => "error", "msg" => "not delete!" ]);

    };
