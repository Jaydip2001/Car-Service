<?php

session_start();

// initializing variables
$name = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost:3307', 'root', '', '123');

if (isset($_POST['submit'])) {
    
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mno = mysqli_real_escape_string($db, $_POST['mno']);
    $cname = mysqli_real_escape_string($db, $_POST['cname']);
    $cmodel = mysqli_real_escape_string($db, $_POST['cmodel']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $latitude = mysqli_real_escape_string($db, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($db, $_POST['longitude']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $discription = mysqli_real_escape_string($db, $_POST['discription']);

    if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($cname)) { array_push($errors, "car name is required"); }
  if (empty($cmodel)) { array_push($errors, "car model is required"); }
  if (empty($city)) { array_push($errors, "service is required"); }
 
    
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $query = "INSERT INTO sos_request(name, email,mno, cname,cmodel,city,latitude,longitude,date,discription) 
  			  VALUES('$name', '$email','$mno','$cname', '$cmodel', '$city','$latitude','$longitude','$date','$discription')";
  	mysqli_query($db, $query);
  	
  	$_SESSION['success'] = "your request submited";
    
    
    header('location: sos.php');
  }
}
?>