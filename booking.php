<?php include('book appoiment.php') ?>


<?php
// require_once("service.php");

// require_once("dbconnect.php");
if(isset($_SESSION['email'])){
   $name=$_SESSION['email'];
} else{
     $name="login";
     header('Location: /car-repair-main/login.php');
 }

?>
<?php


$con = mysqli_connect("localhost:3307","root","","123");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>


.month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}
</style>
<style>

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #D81324;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-right .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
    <meta charset="utf-8">
    <title>CarServ - Car Repair HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   <!-- Topbar Start -->
   <div class="container-fluid bg-light p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-map-marker-alt text-primary me-2"></small>
                <small>Patan,Gujarat</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <small class="far fa-clock text-primary me-2"></small>
                <small>Mon - Fri : 09:00 AM - 10:00 PM</small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-phone-alt text-primary me-2"></small>
                <small>+919191929298</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>CarServ</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="cart.php" class="nav-item nav-link "><img src="img/cart-icon.png" title="VIEW" />
                            <span> 
                            <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
echo  $cart_count; 
}
else echo "0";
?>
	                          	                           		
   	</span></a>
            <a href="index.php" class="nav-item nav-link ">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="service.php" class="nav-item nav-link">Services</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="booking.php" class="dropdown-item active">Booking</a>
                    <a href="team.php" class="dropdown-item">Technicians</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    <!-- <a href="404.php" class="dropdown-item">404 Page</a>
                    <a href="sos.php" class="dropdown-item  ">sos resque</a> -->
                    <a href="feedback.php" class="dropdown-item  ">Feedback</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
                
        </div>
        <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="login.php">Login</a>
  <!-- <hr> -->
  <a href="profile.php">Profile</a>
  <!-- <hr> -->
  <a href="showpassword.php">ChangePassword</a>
  <hr style="border-top: 5px solid black;">
  <a href="adminlogin.php">Admin</a>
  <hr style="border-top: 5px solid black;">
  <a href="logout.php">Logout</a>
  
  
</div>

<div id="main">

<button type="button"  onclick="openNav()" class="btn btn-danger"><?php echo $name ?></button>
 
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "0";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
        
        <!-- <a href="login/login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login/Ragistration<i class="fa fa-arrow-right ms-3"></i></a> -->
    </div>
</nav>
<!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Modern Equipment</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Booking Start -->
    <?php

if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
  foreach($_SESSION["shopping_cart"] as $key => $value) {
    if($_POST["code"] == $key){
    unset($_SESSION["shopping_cart"][$key]);
    $status = "<div class='alert alert-danger text-center alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Product has been removed from Cart!</strong></div>";
    }
    if(empty($_SESSION["shopping_cart"]))
    unset($_SESSION["shopping_cart"]);
      }   
    }
}

// if (isset($_POST['action']) && $_POST['action']=="change"){
//   foreach($_SESSION["shopping_cart"] as &$value){
//     if($value['code'] === $_POST["code"]){
//         $value['quantity'] = $_POST["quantity"];
//          $status = "<div class='alert alert-success text-center alert-dismissible'>
//    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Product has been Updated!</strong></div>";
//         break; // Stop the loop after we've found the product
//     }
// }
    
// }
?>
    <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>

    <!-- <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s"> -->
        <!-- <div class="container"> -->
            <!-- <div class="row gx-5"> -->
                <!-- <div class="col-lg-6 py-5"> -->
                    <!-- <div class="py-5"> -->
                   
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow">
                        <h1 class="text-white mb-4">Your Cart</h1>

                        <!-- <div class="row g-3"> -->
                        
                            <!-- <table>
                            <tr>
    <th>Service package</h1> -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SERVICE PACKAGE</th>
<th scope="col">PRICE</th>
<th scope="col">TOTAL PRICE</th>
</thead><tbody>
                      
      <form method='post' action=''>  
      <?php		
foreach ($_SESSION["shopping_cart"] as $product){

	?>   <tr > 
       
    <td style="color:white;">  <input type='hidden' name='quantity' maxlength="2" size="2" value="<?php echo $product["quantity"]; ?>" /><?php echo $product["name"]; ?>
    <form method='post' action=''>
        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type="submit" class="btn btn-secondary btn-xs" title="REMOVE" style="background: #b66; color: #fff;">
	<strong>X</strong></button></form>  </td>
    <td style="color:white;"><span class="price"> <?php echo "$".$product["price"]*$product["quantity"]; ?></span></p></td>
        <?php  $total_price += ($product["price"]*$product["quantity"]); }   ?>
    <td> <p> <span class="price" style="color:black"><?php echo "$".$total_price; ?></span></p></td>
       
    </tr>
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.4s">
    <div class="container">
    <?php }
    else{
        echo "
        <div class='text-center wow'><h4 style='color:red; text-align:center;'>Your cart is empty!</h4><br><br> 
      <a href='service.php'><button type='button' style='margin-left: 45%; margin-right: 45%;' class='btn btn-warning' data-dismiss='modal'>Select your service</button></a>
      </div>
     ";
        }?>
        </div>
    </div>
</tbody>
    </form>
</table>
    </div>

    <div class="container-fluid bg-secondary booking my-5 wow">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">Certified and Award Winning Car Repair Service Provider</h1>
                        <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow">
                        <h1 class="text-white mb-4">Book For A Service</h1>
                
                        <form method="post" action="#">
                        <?php include('error.php'); ?>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class=" form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class=" form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                <select  name="cbrand" id="cbrand" class="service form-select border-0"  style="height: 55px;"> 
                                      
                                      <option value="0">--Select Your Car Company--</option>
                                      <option value="Mercedes Benz">Mercedes Benz</option>
                                      <option value="BMW">BMW</option>
                                      <option value="Audi">Audi</option>
                                      <option value="Volvo">Volvo</option>
                                      <option value="GMC">GMC</option>
                                      <option value="Mitsubishi">Mitsubishi</option>
                                      <option value="Jaguar">Jaguar</option>
                                      <option value="Porsche">Porsche</option>
                                      <option value="Rolls Royce">Rolls Royce</option>
                                      <option value="Land Rover">Land Rover</option>
                                      <option value="Maruti Suzuki">Maruti Suzuki</option>
                                      <option value="Hyundai">Hyundai</option>
                                      <option value="Honda">Honda</option>
                                      <option value="Toyota">Toyota</option>
                                      <option value="Tata">Tata</option>
                                      <option value="Mahindra">Mahindra</option>
                                      <option value="Fiat">Fiat</option>
                                      <option value="Renault">Renault</option>
                                      <option value="Kia">Kia</option>
                                      <option value="Skoda">Skoda</option>
                                      <option value="Volkswagen">Volkswagen</option>
                                      <option value="Ford">Ford</option>

                                      </select> 
                                <!-- <a href="login.php"><button type="button" class="btn btn-outline-warning"></button></a> -->
                                <!-- <a href="login.php"><button type="button" class="btn btn-outline-warning">WED,1 JUNE</button></a>
                                <a href="login.php"><button type="button" class="btn btn-outline-warning">THU,2 JUNE</button></a>
                                <a href="login.php"><button type="button" class="btn btn-outline-warning">FRI,3 JUNE</button></a>
                                <a href="login.php"><button type="button" class="btn btn-outline-warning">SAT,4 JUNE</button></a>
                                <a href="login.php"><button type="button" class="btn btn-outline-warning">SUN,5 JUNE</button></a>
                                <a href="login.php"><button type="button" class="btn btn-outline-warning">MON,6 JUNE</button></a> -->
                                    <!-- <input type="text" name="cname" class=" form-control border-0" placeholder="Enter car name" style="height: 55px;"> -->
                                </div>
                                <div class="col-12 col-sm-6">
                                <select  name="cmodel" id="cmodel" class="service form-select border-0" style="height: 55px;"> 
                                      
                                      <option value="0">--Select Your Car Model--</option>
                                      <option value="2000">2000</option>
                                      <option value="2001">2001</option>
                                      <option value="2002">2002</option>
                                      <option value="2003">2003</option>
                                      <option value="2004">2004</option>
                                      <option value="2005">2005</option>
                                      <option value="2006">2006</option>
                                      <option value="2007">2007</option>
                                      <option value="2008">2008</option>
                                      <option value="2009">2009</option>
                                      <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>

                                      </select> 
                                    <!-- <input type="text" name="cmodel" class=" form-control border-0" placeholder="Enter model no" style="height: 55px;"> -->
                                </div>
                                <div class="col-12 col-sm-6">
                                
                                <select  name="ftype" id="ftype" class="service form-select border-0"style="height: 55px;">
                                      
                                      <option value="0">--Select Fuel Type--</option>
                                      <option value="PETROL">PETROL</option>
                                      <option value="DIESEL">DIESEL</option>
                                      <option value="CNG">CNG</option>
                                      <option value="ELECTRIC">ElECTRIC</option>
                                      </select>
                                 
                                </div>
                               
    
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        
<!-- <form action="/action_page.php"> -->
  <!-- <label for="birthday">Birthday:</label> -->
  <input type="date" id="date" name="date"  class="form-control border-0" style="height: 55px;">
  <!-- <input type="submit" value="Submit"> -->
<!-- </form> -->
                                    </div>
                                </div>
                                <div class="col-12 ">

                                    <select  name="eservice" id="pick" class="service form-select border-0" style="height: 55px;">
                                      
                                    <option value="drop off">Drop Off</option>
                                    <option value="pick up">Pick Up</option>
                                    </select>
                                </div>
                                
                                <div class="col-12 " id="pa">
                                <textarea name="address" class="form-control border-0" placeholder="Drop Or Pick Up Address"></textarea>
                                </div>
                               
                                <div class="col-12">
                                    <textarea name="discription" class="form-control border-0" placeholder="Special Request"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3 " name="book" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form> 
                                    </div>
                </div>
            </div>
        </div>
    </div>
   







    
    <!-- Booking End -->


    <!-- Call To Action Start -->
    <div class="container-xxl py-5 wow">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-6">
                    <h6 class="text-primary text-uppercase">// Call To Action //</h6>
                    <h1 class="mb-4">Have Any Pre Booking Question?</h1>
                    <p class="mb-0">Lorem diam ea sit dolor labore. Clita et dolor erat sed est lorem sed et sit. Diam sed duo magna erat et stet clita ea magna ea sed, sit labore magna lorem tempor justo rebum dolores. Eos dolor sea erat amet et, lorem labore lorem at dolores. Stet ea ut justo et, clita et et ipsum diam.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary d-flex flex-column justify-content-center text-center h-100 p-4">
                        <h3 class="text-white mb-4"><i class="fa fa-phone-alt me-3"></i>+012 345 6789</h3>
                        <a href="" class="btn btn-secondary py-3 px-5">Contact Us<i class="fa fa-arrow-right ms-3"></i></a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->


    <!-- Footer Start -->
    
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>HNGU CAMP,DCS , PATAN</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+919909809998</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>CARSERV@GMAIL.COM</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="periodicservice.php">Periodic Service</a>
                    <a class="btn btn-link" href="denting&painting.php">Denting & Painting</a>
                    <a class="btn btn-link" href="batteries.php">Batteries</a>
                    <a class="btn btn-link" href="acservice&repair.php">AcService & repair</a>
                    <a class="btn btn-link" href="tyresservice.php">TyresAnd Wheels</a>
                    <a class="btn btn-link" href="customservice.php">Custom Service</a>
                    <a class="btn btn-link" href="carspa.php">Carspa & Cleaning</a>
                    <a class="btn btn-link" href="clutchandfitment.php">Clutch & Fitments</a>
                    <a class="btn btn-link" href="windshieldandlight.php">Windshield & Lights</a>
                    <a class="btn btn-link" href="insuranceclaim.php">Insurance Claim</a>
                    <a class="btn btn-link" href="engineservice.php">Engine Servicing</a>
                    <a class="btn btn-link" href="ppfcoat.php">PPFCoating for car</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Please Enter Your Email For Updates</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">CarServ</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top "><i class="fa fa-car"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>