<?php

session_start();

include("server/connection.php");

//if user has already registered, take user to account page
if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}



if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassowrd = $_POST['confirm-password'];

  //check passwords match
  if($password != $confirmPassowrd){
    header('location: register.php?error=passwords do not match');
  }


  //check password > 6 characters
  else if(strlen($password) < 6){
    header('location: register.php?error=password must be at least 6 characters');
  

  //if there is not error
  }else{
      //$email = $_GET['email'];
        //if user already in database
        $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        //if user already registered with email
        if($num_rows != 0){
          header('location: register.php?error=user with this email already exists');

        //if no user has registered with this email  
        }else{

            //create new user
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password)
                                    VALUES (?, ?, ?)");

            $stmt->bind_param('sss', $name, $email, $password);


            //if account was created successfully

            if($stmt->execute()){
              $user_id = $stmt->insert_id;
              $_SESSION['user_id'] = $user_id;
              $_SESSION['user_email'] = $email;
              $_SESSION['user_name'] = $name;
              $_SESSION['logged_in'] = true;
              header('location: account.php?register=You have registerd successfully');
            
            //account could not be created
            }else{
              header('location: register.php?eror=could not create an account at the moment');

            }
        }

      }
    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css"/>

    <link href="assets/css/fontawesome.css" rel="stylesheet"/>
    <link href="assets/css/solid.css" rel="stylesheet"/>
    <link href="assets/css/brands.css" rel="stylesheet"/>
    
</head>
</body>


  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container">
      <img class="logo" src="assets/img/logo2.jpeg">
      <h2 class="brand">Apartment Finds</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inquiries.php">Inquiries</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="save.php">Saves</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a href="account.php"><i class="fa-solid fa-user"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!--Register-->
  <section class="mt-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Register</h2>
        <hr class="mx-auto"/>
    </div>
    <div class="mx-auto container">
        <form id="register-form" method="POST" action="register.php">
          <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirm-password" placeholder="Confirm Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
            </div>
            <div class="form-group">
                <a id="login-url" href="login.php" class="btn">Already have an account? Login</a>
            </div>
        </form>
    </div>
  </section>



  <!--Footer-->
  <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo" src="assets/img/logo2.jpeg"/>
        <p class="pt-3">We provide the most user friendly method for apartment search</p>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pd-2">Featured</h5>
        <ul class="text-uppercase">
          <li><a href="#">apartments</a></li>
          <li><a href="#">condos</a></li>
          <li><a href="#">townhomes</a></li>
          <li><a href="#">houses</a></li>
          <li><a href="#">student housing</a></li>
          <li><a href="#">luxury apartments</a></li>
        </ul>
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Contact Us</h5>
        <div>
          <h6 class="text-uppercase">Address</h6>
          <p>1234 Street Name, City</p>
        </div>
        <div>
          <h6 class="text-uppercase">Phone</h6>
          <p>012-345-6789</p>
        </div>
        <div>
          <h6 class="text-uppercase">Email</h6>
          <p>email@gmail.com</p>
        </div>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Instagram</h5>
        <div class="row">
          <img src="assets/img/footer1.jpeg" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/img/footer2.jpeg" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/img/footer3.jpeg" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/img/footer4.jpeg" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/img/type6.jpeg" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/img/footer5.jpeg" class="img-fluid w-25 h-100 m-2"/>
        </div>
      </div>
    </div>

    <div class="copyright mt-5">
      <div class="row container mx-auto">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <img src="assets/img/payment.jpeg"/>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap mb-2">
          <p>Apartment Finds @ 2025 All Rights Reserved</p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <a href="a"><i class="fab fa-facebook"></i></a>
          <a href="a"><i class="fab fa-instagram"></i></a>
          <a href="a"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </footer>