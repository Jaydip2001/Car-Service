<?php
session_start();
if(isset($_SESSION['email'])){
    $name=$_SESSION['email'];
 } else{
      $name="login";
      header('Location: /car-repair-main/login.php');
  }
?>
<?php
// session_start();



   $DATABASE_HOST = 'localhost:3307';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = '123';
   $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
   if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
   }
//    $stmt->bind_param('i', $_SESSION['id']);
//    $stmt->execute();
//    $stmt->close();
   if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
   } else {
    $id = $_SESSION['id'];
   }
   $mysqli = $con;

   if ($mysqli->connect_errno) {
   echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
   exit();
   
   } 
    
   ?>
<?php
// Include database connection file
// require_once "server.php";
// $pass_is_right = password_verify($password,$_POST['password']);
// $password = password_hash($password, PASSWORD_DEFAULT);
    if(count($_POST)>0) {
    mysqli_query($con,"UPDATE users set  firstname='" . $_POST['firstname'] . "', mno='" . $_POST['mno'] . "' ,email='" . $_POST['email'] . "',city='" . $_POST['city'] . "',cartype='" . $_POST['cartype'] . "' WHERE id='" . $_POST['id'] . "'");
     
     header("location: profile.php");
     exit();
    }
    $result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
                    <a href="booking.php" class="dropdown-item">Booking</a>
                    <a href="team.php" class="dropdown-item">Technicians</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    <a href="404.php" class="dropdown-item active">404 Page</a>
                    <a href="sos.php" class="dropdown-item  ">sos resque</a>
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
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Update Record</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    


 


        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header"> -->
                    
                    <!-- <p align="center">Please edit the input values and submit to update the record.</p> -->
                    <div class='text-center wow fadeInUp' data-wow-delay='0.3s'>
<div class='conta'>
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">//  Update Your Profile//</h6>
                <h1 class="mb-5"> <p>Please edit the input values and submit to update the record.</p> </h1>
            </div>
  <div class='row' style='margin: 10px'>
    <div class='col-lg-12'>    
<table class="table table-striped">
<thead>
                       
                    <!-- </div> -->
                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <!-- <div class="form-group"> -->
                          <tr>
                        <th scope="co"> <label>Name</label></th>
                          <th scope="co">   <label>Email</label></th>
                          <!-- <th scope="co"> <label>Password</label></th> -->
                          <th scope="co"> <label>Mobile</label></th>
                          <th scope="co">  <label>city</label></th>
                          <th scope="co"> <label>cartype</label></th></tr>
</thead>
<tbody>  
<tr>                          
<td><input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"]; ?>" maxlength="50" required=""></td>
                            
                        <!-- </div> -->
                        <!-- <div class="form-group "> -->
                       
                            <td><input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" maxlength="40" required=""></td>
                            <!-- <td><input type="passowrd" name="password" class="form-control" value="<?php echo $row["password"]; ?>" maxlength="100" required=""></td> -->
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                       
                            <td><input type="text" name="mno" class="form-control" value="<?php echo $row["mno"]; ?>" maxlength="12"required=""></td>
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                       
                            <td><input type="text" name="city" class="form-control" value="<?php echo $row["city"]; ?>" maxlength="12"required=""></td>
                            
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                           
                            <td><input type="text" name="cartype" class="form-control" value="<?php echo $row["cartype"]; ?>" maxlength="15"required=""></td>
                        <!-- </div><button type='button' class='btn btn-success' style='float: center;' data-dismiss='modal'>Edit Profile</button> -->
</tr>
<tr>
  <td colspan='5' align='right'>
  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
  <!-- <a href="service.php"><button type="button" class="btn btn-success" style="float: left;" data-dismiss="modal">select another service</button></a> -->
      
                        <input type="submit" class="btn btn-success" value="Submit" data-dismiss='modal'>
                        <a href="profile.php"><button type="button" class="btn btn-primary">Cancle</button></a>
                        <!-- <a href="profile.php" class="btn btn-default">Cancel</a> -->
      
  </td>
</tr>
                        
                    </form>
                    </tbody>
</table></div></div></div></div>
               

    <!-- 404 End -->
        

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