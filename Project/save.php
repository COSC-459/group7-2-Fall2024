<?php

session_start();
if(isset($_POST['add_to_saves'])){
  //if added to nonempty save
  if(isset($_SESSION['saves'])){

    $units_array_ids = array_column(array: $_SESSION['saves'], column_key: 'unit_id');

    //if unit already added or not
    if(!in_array(needle: $_POST['unit_id'], haystack: $units_array_ids)){
      $unit_id = $_POST['unit_id'];
        $unit_array = array(
                  'unit_id' => $_POST['unit_id'], 
                  'unit_name' => $_POST['unit_name'],
                  'unit_rent' => $_POST['unit_rent'], 
                  'unit_img' => $_POST['unit_img'] 
        );

        $_SESSION['saves'][$unit_id] = $unit_array;

    }else{
      echo '<script>alert("Item has already been added.")</script>';
    }

  }else{
    $unit_id = $_POST['unit_id'];
      $unit_array = array(
        'unit_id' => $_POST['unit_id'], 
        'unit_name' => $_POST['unit_name'],
        'unit_rent' => $_POST['unit_rent'], 
        'unit_img' => $_POST['unit_img'] 
      );

    $_SESSION['saves'][$unit_id] = $unit_array;
    
  }

//remove from saves
}else if(isset($_POST['remove_unit'])){
  $unit_id = $_POST['unit_id'];
  unset($_SESSION['saves'][$unit_id]);

}


else{
  //header('location: index.php');
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



  <!--Saved Units-->
  <section class="saved container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Saved Units</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Unit</th>
            <th>Total Saves</th>
        </tr>

        <?php foreach($_SESSION['saves'] as $key => $value){ ?>

        <tr>
            <td>
                <div class="unit-info">
                    <img src="assets/img/<?php echo $value['unit_img']; ?>"/>
                    <div>
                        <p><?php echo $value['unit_name']; ?></p>
                        <small><span>$</span><?php echo $value['unit_rent']; ?></small>
                        <br>
                        <form method="POST" action="save.php" >
                          <input type="hidden" name="unit_id" value="<?php echo $value['unit_id']; ?>" />
                          <input type="submit" name="remove_unit" class="remove-btn" value="remove"/>
                        </form>
                    </div>
                </div>
            </td>
           
        </tr>

        <?php } ?>

    </table>

    <div class="saved-quantity">
        <table>
            <tr>
                <form method="POST" action="server/get_saves.php">
                  <input type="hidden" name="unit_id" value="<?php echo $value['unit_id']; ?>"/> 
                  <input type="submit" class="quan-btn" value="Save To Dashboard" name="save_dash" />
                  <input type="submit" class="quan-btn" value="View In Dashboard" name="view_dash" />
                </form>
            </tr>
        </table>
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
          <p>info@gmail.com</p>
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
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>