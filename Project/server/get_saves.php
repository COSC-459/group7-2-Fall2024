<?php 

session_start();

include("connection.php");

if(isset($_POST['save_dash'])){

    foreach($_SESSION['saves'] as $key => $value){
        $unit = $_SESSION['saves'][$key];
        $unit_id = $unit['unit_id'];
        $unit_name = $unit['unit_name'];
        $unit_rent = $unit['unit_rent'];
        $unit_img = $unit['unit_img'];
        $user_id = $_SESSION['user_id'];

        $stmt1 = $conn->prepare("INSERT INTO saved (unit_id, unit_name, unit_rent, unit_img, user_id)
                                VALUES (?, ?, ?, ?, ?) ");

        $stmt1->bind_param('isisi',$unit_id, $unit_name, $unit_rent, $unit_img, $user_id);

        $stmt1->execute();

    }

    header('location: ../save.php');


}

if(isset($_POST['view_dash'])){
    header('location: ../account.php');
}





?>