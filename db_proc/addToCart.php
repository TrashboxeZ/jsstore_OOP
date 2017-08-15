<?php
session_start();
header('Content-Type: application/json');
require '../db.php';
$productId = filter_input(INPUT_POST, 'id');
$count = filter_input(INPUT_POST, 'count');


if($query = $db->query("INSERT INTO caret VALUES (null, '{$_SESSION['id']}', '{$productId}' )")){
    echo json_encode([ "status" => "ok", "msg" => "ok" ]);
    $_SESSION['notif'] = $count;
}
else{
    echo json_encode([ "status" => "error", "msg" => "fill the field!" ]);
}