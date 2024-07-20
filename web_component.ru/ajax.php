<?php
require_once "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

     $data = json_decode(file_get_contents('php://input'), true);
     
     // Update
     $dtName = $data['ch_count_by_name'];
     $sqlUpdate = "UPDATE items SET price=price+1 WHERE name = ?";
     $db->query($sqlUpdate, [$dtName]);

     // Count
     $price = 0;
     $sqlSelect = "SELECT * FROM items WHERE name = ?";
     $res = $db->query($sqlSelect,[$dtName])[0];
     if($res) {
          $price = $res['price'];
     }
     echo $price;
}