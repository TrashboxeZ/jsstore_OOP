<?php
header('Content-Type: application/json');
require '../db.php';

$db = Db::getInstance();
$id = filter_input(INPUT_GET, 'id');
$num = 6;
$page = filter_input(INPUT_GET, 'page');

if($page != null){
    
    $offset = ($page-1)*$num;
    if($query = $db->select("products", $id, $page, $offset,$num)){
        $products = [];
        while ($row = $query->fetch_assoc())
        {
            $products[] = $row;
        };
    };
    echo json_encode($products);
}

else{
    if($query = $db->select("products",$id,$page,$page,$num)){
            
            $count = $query->fetch_assoc();
            $count = $count["count(id)"];
            $total = intval(($count-1) / $num)+1;
            echo $total;
        } 
}


# 422
#472