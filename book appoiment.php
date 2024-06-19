<?php
session_start();
// require_once("dbconnect.php");
// initializing variables
$name = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', '123');

// REGISTER USER
if (isset($_POST['book'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $cbrand = mysqli_real_escape_string($db, $_POST['cbrand']);
  $cmodel = mysqli_real_escape_string($db, $_POST['cmodel']);
  $ftype = mysqli_real_escape_string($db, $_POST['ftype']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $eservice = mysqli_real_escape_string($db, $_POST['eservice']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $discription = mysqli_real_escape_string($db, $_POST['discription']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($cbrand)) { array_push($errors, "car brand is required"); }
  if (empty($cmodel)) { array_push($errors, "car model is required"); }
  if (empty($ftype)) { array_push($errors, "ftype is required"); }
  if (empty($date)) { array_push($errors, "date is required"); }
    
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO service_book(name, email,cbrand, cmodel,ftype,date,eservice,address,discription) 
  			  VALUES('$name', '$email','$cbrand','$cmodel', '$ftype','$date','$eservice','$address','$discription')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "Your service booked... ";
    
  //	header("service booked ..");
  }
}



  ?>
  