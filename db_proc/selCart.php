<?php
session_start();
header('Content-Type: application/json');
require '../db.php';
//var_dump($_SESSION);

if($query = $db->query("SELECT c.id, p.title, SUM(p.price) as price, COUNT(p.id) as count FROM products p, caret c WHERE c.user_id = '{$_SESSION['userId']}' AND p.id = c.product_id GROUP by p.title")){
    $products = [];
    while ($row = $query->fetch_assoc())
    {
        $products[] = $row;
    };
    echo json_encode($products);
}else{
    echo json_encode([ "status" => "error", "msg" => "fill the field!" ]);
}