<?php
session_start();
header('Content-Type: application/json');
require '../db.php';
$phone = filter_input(INPUT_POST, 'phone');
$address = filter_input(INPUT_POST, 'address');
$paytype = filter_input(INPUT_POST, 'paytype');
$date = filter_input(INPUT_POST, 'date');

if($q = $db->query("SELECT c.product_id FROM caret c WHERE c.user_id = '{$_SESSION['id']}'")){
    while ($row = $q->fetch_assoc()){
//        var_dump($row);
       $db->query("INSERT INTO orders VALUES (null, '{$_SESSION['id']}','{$row['product_id']}' ,'{$address}', '{$phone}','{$paytype}','{$date}')");
        
    }
     if($query = $db->query("SELECT o.product_id, o.paytype, o.date
FROM orders o, products p WHERE p.id = o.product_id AND o.user_id = '{$_SESSION['id']}'")){
      while ($row = $query->fetch_assoc()){
//        var_dump($row);
       $db->query("INSERT INTO history VALUES (null, '{$_SESSION['id']}','{$row['product_id']}','Доставлен', '{$row['paytype']}','{$row['date']}')");
    }
    $db->query("DELETE FROM caret WHERE user_id ='{$_SESSION['id']}'; ");
    $db->query("DELETE FROM orders WHERE user_id ='{$_SESSION['id']}'; ");
         
}
        echo json_encode([ "status" => "ok", "msg" => "ok" ]);
}
else{
    echo json_encode([ "status" => "error", "msg" => "fill the field!" ]);
}