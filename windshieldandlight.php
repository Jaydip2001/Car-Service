<?php
session_start();
if(isset($_SESSION['email'])){
   $ename=$_SESSION['email'];
} else{
     $ename="login";
 }

?>

<?php

$con = mysqli_connect("localhost:3307","root","","123");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>
<?php
if (isset($_POST['code']) && $_POST['code']!=""){
  
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM service_list WHERE code='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
		//Product is not Added to Cart. It will Add to Cart and Prevent page from refereshing
 echo "<script>
 return false;
 </script>";

}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		// echo "<script> alert('Product is Already added to your cart!'); </script>";
    $AlreadyAdded = "<div class='alert alert-danger text-center alert-dismissible'>
   <a href='cart.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Product is Already Added to Cart!</strong></div>";

	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	//Product is not Added to Cart. It will Add to Cart and Prevent page from refereshing
	    echo "<script>
      return false;
      </script>";

	}

	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
$(".alert").delay(1000).slideUp(100, function() {
    $(this).alert('close');
});
  </script>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
        .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
div.scrollmenu{
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

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
            <a href="service.php" class="nav-item nav-link active">Services</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="booking.php" class="dropdown-item">Booking</a>
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

<button type="button"  onclick="openNav()" class="btn btn-danger"><?php echo $ename ?></button>
 
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
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
<?php if (!empty($AlreadyAdded)) {  echo $AlreadyAdded; } ?></div>

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

     <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">//  Services //</h6>
                <h1 class="mb-5">Explore Our Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <div class="d-flex py-5 px-4"> -->
                        <!-- <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i> -->
                        <!-- <div class="ps-4"> -->
                            <!-- <h5 class="mb-3">Periodic Service</h5> -->
                            <!-- <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p> -->
                             <a href="periodicservice.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-calendar-check-fill fa-3x"></i>Periodic Service</a>
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <div class="d-flex py-5 px-4"> -->
                        <!-- <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i> -->
                        <a href="denting&painting.php"  data-bs-target="#tab-pane-2" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-paint-bucket fa-3x"></i>Denting & Painting</a>
                        <!-- <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div> -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <div class="d-flex py-5 px-4"> -->
                        <!-- <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i> -->
                        <a href="batteries.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-battery-full fa-4x"></i>Batteries</a>
                        <!-- <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div> -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <div class="d-flex  py-5 px-4"> -->
                    <a href="acservice&repair.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-thermometer-snow fa-3x"></i> AcService & repair</a>
                        <!-- <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div> -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <div class="d-flex  py-5 px-4"> -->
                    <a href="tyresservice.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-vinyl fa-3x"></i>TyresAnd Wheels</a>
                        <!-- <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Diam dolor diam ipsum sit amet diam et eos erat ipsum</p>
                            <a class="text-secondary border-bottom" href="">Read More</a>
                        </div> -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="customservice.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-wrench fa-3x"></i>Custom Service</a>
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="carspa.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-wind fa-3x"></i> Carspa & Cleaning</a>
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="clutchandfitment.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-disc-fill fa-3x"></i>Clutch & Fitments</a>
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="windshieldandlight.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-app fa-3x"></i>Windshield & Lights</a>
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="insuranceclaim.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-shield-check fa-3x"></i>Insurance Claim</a>
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="engineservice.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-tools fa-3x
                    "></i>Engine Servicing</a>
                </div>
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="ppfcoat.php" class="btn btn-primary py-3 px-5 mt-3"><i class="bi bi-layers-fill fa-3x"></i>PPFCoating for car</a>
                </div>
            </div>
        </div>
    </div>

    <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='fh09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
   
    <div class="container-xxl py-5">
        <div class="container">
            
            <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Front Headlight</h5>5000
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='rt09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Rear Taillight</h5>3000
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='rcc09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-4.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Rear Center Camera</h5>2100
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='fl09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Fog Light</h5>1700
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='fwr09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-4.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Front Windshield Replacement 5900</h5>
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='rwr09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Rear Windshield Replacement</h5>4000
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline/-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='dgr09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Door Glass Replacement</h5>1500
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
$result = mysqli_query($con,"SELECT * FROM `service_list` where code='smr09'");
while($row = mysqli_fetch_assoc($result)){
	
  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                            <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Side Mirror Replacement</h5>2200
                            <small><p class="card-text"> <ul><li>1000 Kms or 1 Month Warranty</li><li>5000 Kms or 3 Months Warranty</li></ul></p>
                                                <p><i class="fa fa-check text-success me-3"></i>Interior Vaccuming(Carpet & Seats)</p>
                                 <p><i class="fa fa-check text-success me-3"></i>Engine Oil Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Oil Filter Replacement</P>
                            <p><i class="fa fa-check text-success me-3"></i>Wiper Fluid Replacement</p>
                            <p><i class="fa fa-check text-success me-3"></i>Air Filter Cleaning</p>
                            <p><i class="fa fa-check text-success me-3"></i>Battery Water Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Coolant Top Up</p>
                            <p><i class="fa fa-check text-success me-3"></i>Car Wash</p>
                            <form method='post' action=''>
                            <p> <input type='hidden' name='code' value="<?php echo $row["code"]; ?>" /></p>
                            <p> <span class='item_price'>$<?php echo $row["price"]; ?></span>
											<del>$<?php echo $row["price"] * 2.0; ?></del></p>
                                            <!-- <button type="submit"  class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2' onclick="myFun()" style='color:#fff; border: none;'><strong>select</strong></button> -->
                  <p>  <small class="text-muted"><button type="submit" class="btn btn-outline-success">Select</button></small></small></p>
                   <!-- <p> <small><a href="cart.php"><button type="button" class="btn btn-outline-success">cart</button></a> </small></p> -->
</form>
          <!-- <p class="card-text"><small class="text-muted"><button type="button" class="btn btn-outline-success">Select</button></small></p></small> -->
                        </div>
                    </div>
                </div>
                <?php
		        
            }}}}}}}}
    mysqli_close($con);
    ?>	
    <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     
    <!-- Service End -->


    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">Certified and Award Winning Car Repair Service Provider</h1>
                        <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Book For A Service</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control border-0 datetimepicker-input"
                                            placeholder="Service Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Request"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Testimonial Start -->
    <!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// Testimonial //</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-car"></i></a>


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