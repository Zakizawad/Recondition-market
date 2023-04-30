<?php

include("connection.php");

$id = $_POST['product_id'];

$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = $id"); 

$stmt->execute();

$products = $stmt->get_result();


?>