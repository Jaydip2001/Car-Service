<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', '123');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mno = mysqli_real_escape_string($db, $_POST['mno']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mno)) { array_push($errors, "Mobile No. is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email,mno, password,address,city) 
  			  VALUES('$username', '$email',$mno,'$password', '$address', '$city')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    
  	header('location: login.php');
  }
}

// ... 
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "login successfull";
          header("location:index.php");
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  // if (isset($_POST['login_admin'])) {

  //   $uname = mysqli_real_escape_string($db, $_POST['uname']);
  //   $apassword = mysqli_real_escape_string($db, $_POST['password']);
  
  //   // if (empty($aemail)) {
  //   //     array_push($errors, "email is required");
  //   // }
  //   // if (empty($apassword)) {
  //   //     array_push($errors, "Password is required");
  //   // }
  
  //   if (count($errors) == 0) {
      
  //     $query = "SELECT * FROM admin WHERE uname='$uname' AND password='$apassword'";
  //     $results = mysqli_query($db, $query);
  //     if (mysqli_num_rows($results) == 1) {
  //       $_SESSION['uname'] = $uname;
  //       // $_SESSION['ausername'] = $username;
  //       $_SESSION['success'] = "login successfull";
  //       header("location: ad/car-repair/admin/index.php");
  //     }else {
  //         array_push($errors, "Wrong username/password combination");
  //     }
  //   }
  // }
  if (isset($_POST['login_admin'])) {

    $aemail = mysqli_real_escape_string($db, $_POST['aemail']);
    $apassword = mysqli_real_escape_string($db, $_POST['pass']);
  
    if (empty($aemail)) {
        array_push($errors, "email is required");
    }
    if (empty($apassword)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
      
      $query = "SELECT * FROM admin WHERE uname='$aemail' AND pass='$apassword'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['uname'] = $aemail;
        // $_SESSION['pass'] = $username;
        $_SESSION['success'] = "login successfull";
        header("location:../car-repair-main/admin/index.php");
      }else {
          array_push($errors, "Wrong username/password combination");
      }
    }
  }
  ?>