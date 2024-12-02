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

  <!--AC Units-->
  <section id="s_units" class="my-5 py-5">
    <div class="container text-center mt-5 py-5">
      <h3>Units</h3>
      <hr>
      <p>In-Unit Air Conditioning</p>
      <a href="washer_dryer.php" id="filter-btn">Washer & Dryer</a>
        <a href="ac.php" id="filter-btn">AC</a>
        <a href="utilities.php" id="filter-btn">Untilities</a>
        <a href="dw.php" id="filter-btn">Dishwasher</a>
        <a href="parking.php" id="filter-btn">Parking</a>
        <a href="gym.php" id="filter-btn">Gym</a>
        <a href="pets.php" id="filter-btn">Pets</a>
        <a href="gated.php" id="filter-btn">Gated</a>
        <a href="schools.php" id="filter-btn">Schools</a>
        <a href="transit.php" id="filter-btn">Transit</a>
    </div>
    <div class="row mx-auto container-fluid">
    
    <?php include('server/connection.php'); ?>
    <?php include('server/get_ac.php'); ?>
    <?php while($row = $ac_units->fetch_assoc()){ ?>

      <div class="unit text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/img/<?php echo $row['unit_img']; ?>"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="u-name"><?php echo $row['unit_name']; ?></h5>
        <h4 class="u-rent">$ <?php echo $row['unit_rent']; ?></h4>
        <a href="<?php echo "unit_details.php?unit_id=". $row["unit_id"]; ?>"><button class="btn details-btn">See Details</button></a>
      </div>
      <?php } ?>
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