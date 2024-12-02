<?php
//all units//
include('server/connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units");

$stmt->execute();

$units = $stmt->get_result();

?>