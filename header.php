<?php session_start();

  $login_and_register = '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li><li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Register</a><div class="dropdown-menu"><a class="dropdown-item" href="customer_registration.php">Customers</a><a class="dropdown-item" href="agency_registration.php">Agencies</a></div></li>';
  $insert_more_links = "";
  if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['username'])){
    $login_and_register = "";  #remove login and register from header
    if (isset($_SESSION['usertype']) && $_SESSION['usertype']=="agency")
      $insert_more_links.='<li class="nav-item"><a class="nav-link" href="add_cars.php">Add Cars</a></li><li class="nav-item"><a class="nav-link" href="update_data.php">Update Data</a></li><li class="nav-item"><a class="nav-link" href="booked_cars.php">View Bookings</a></li>';
    $insert_more_links.= '<li class="nav-item"><a class="nav-link" href="../carrental/#contact_unique">Contact Us</a></li><li class="nav-item" style="background-color: red; border-radius:20px;"><a class="nav-link" href="logout.php">Logout</a></li>';
  }

  echo '
    <header class="" style="color: white !important; background: rgba(0,0,0,0.8) !important; position: fixed; top:0px; left:0px;">
      <nav class="navbar navbar-expand-lg">
        <div class="container" style="opacity: 1;">
          <a class="navbar-brand" href="index.php"><h2>Car Rental<em> Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cars_on_rent.php">Book Car</a>
              </li>
              '.$login_and_register.$insert_more_links.'
            </ul>
          </div>
        </div>
      </nav>
    </header>';
?>