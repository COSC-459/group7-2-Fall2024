<?php 

session_start();

include("connection.php");

if(isset($_POST['make_inquiry'])){


    //1. get user info, store in db
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $moveIn = date('Y-m-d', strtotime($moveIn));
    $action = $_POST['action'];
    $inquiry_status = "on_hold";
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO inquiries (inquiry_status, user_id, user_name, user_phone, user_city, user_address, move_in_date, user_action, user_email)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ");

    $stmt->bind_param('iisississ', $inquiry_status, $user_id, $name, $phone, $city, $address, $moveIn, $action, $email);
    
    $stmt->execute();


    //2. issue new inquiry, store inquire info, store in db
    $inquiry_id = $stmt->insert_id;



    //3. get units from inquiries (session)
    foreach($_SESSION['inquiry'] as $key => $value){
        $unit = $_SESSION['inquiry'][$key];
        $unit_id = $unit['unit_id'];
        $unit_name = $unit['unit_name'];
        $unit_rent = $unit['unit_rent'];
        $unit_img = $unit['unit_img'];


        //4. store each unit in inquiry_unit db
        $stmt1 = $conn->prepare("INSERT INTO inquiry_units (inquiry_id, unit_id, unit_name, unit_rent, unit_img, user_id)
                                VALUES (?, ?, ?, ?, ?, ?) ");

        $stmt1->bind_param('iisisi', $inquiry_id, $unit_id, $unit_name, $unit_rent, $unit_img, $user_id);

        $stmt1->execute();

    }
    //5. remove inquiries from list --> delayed until complete process
    //unset($_SESSION['saves']);



    //6. inform user of errors
    header('location: ../account.php?inquiry_status="inquiry sent successfully"');
    




}





?>