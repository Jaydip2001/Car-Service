<?php
session_start();
// require_once("dbconnect.php");
// initializing variables
$name = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', '123');

// REGISTER USER
if (isset($_POST['payment'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  // $service = mysqli_real_escape_string($db, $_POST['service']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $cardname = mysqli_real_escape_string($db, $_POST['cardname']);
  $cardnumber = mysqli_real_escape_string($db, $_POST['cardnumber']);
  $expmonth = mysqli_real_escape_string($db, $_POST['expmonth']);
  $expyear = mysqli_real_escape_string($db, $_POST['expyear']);
  $cvv = mysqli_real_escape_string($db, $_POST['cvv']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "fullname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($address)) { array_push($errors, "address is required"); }
  if (empty($city)) { array_push($errors, "city model is required"); }
  if (empty($state)) { array_push($errors, "state is required"); }
  if (empty($zip)) { array_push($errors, "zip is required"); }
  if (empty($cardname)) { array_push($errors, "cardname is required"); }
  if (empty($cardnumber)) { array_push($errors, "cardnumber is required"); }
  if (empty($expmonth)) { array_push($errors, "expmonth is required"); }
  if (empty($expyear)) { array_push($errors, "expyear is required"); }
  if (empty($cvv)) { array_push($errors, "cvv is required"); }
    
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO checkpayment(fullname, email,address, city,state,zip,cardname,cardnumber,expmonth,expyear,cvv) 
  			  VALUES('$fullname', '$email','$address','$city', '$state','$zip ','$cardname','$cardnumber','$expmonth','$expyear','$cvv')";
  	mysqli_query($db, $query);
  	// $_SESSION['fullname'] = $fullname;
  	// $_SESSION['fullname'] = "THANK YOU";
    
    header("location:index.php");
  }
}



  ?>
  