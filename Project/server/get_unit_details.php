<?php

include("server/connection.php");

if(isset($_GET['unit_id'])){
  $unit_id = $_GET['unit_id'];  

    $stmt = $conn->prepare(query: "SELECT * FROM units WHERE unit_id = ?");
    $stmt->bind_param(types: "i", var: $unit_id);           
    $stmt->execute();

    $unit = $stmt->get_result();//[]

//no product id given
}else{
  header(header: 'location: index.php');
}

?>