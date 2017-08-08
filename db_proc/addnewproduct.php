<?php
header('Content-Type: application/json');
require '../db.php';



$id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');

if(!empty($title) && !empty($price) && !empty($description)){

    # Обновление БД
    if(!empty($id)){
        
         if($query = $db->update("products", $id, $title, $description, $price)){
            echo json_encode([[ "id" => "{$id}", "title" => "{$title}", "description" => "{$description}", "price" => "{$price}"]]);
        }
    }else{
    # Вставка в БД
        if($insQuery = $db->update('products',$id, $title, $description, $price)){
                        
            if($selQuery = $db->query("SELECT * FROM products WHERE id = LAST_INSERT_ID();")){
            $products = [];  
            while ($row = $selQuery->fetch_assoc()){
                $products[] = $row;
            };
            echo json_encode($products);
            }
        };
    };
}
else{
    echo json_encode([ "status" => "error", "msg" => "fill the field!" ]);
}
