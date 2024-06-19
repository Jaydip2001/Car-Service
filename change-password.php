
<?php
	session_start();

	if(isset($_POST['update'])){
		//get POST data
		$old = $_POST['old'];
		$new = $_POST['new'];
		$retype = $_POST['retype'];

		//create a session for the data incase error occurs
		$_SESSION['old'] = $old;
		$_SESSION['new'] = $new;
		$_SESSION['retype'] = $retype;

		//connection
		$conn = new mysqli('localhost:3307', 'root', '', '123');

		//get user details
		$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		//check if old password is correct
		if(password_verify($old, $row['password'])){
			//check if new password match retype
			if($new == $retype){
				//hash our password
				$password = password_hash($new, PASSWORD_DEFAULT);

				//update the new password
				$sql = "UPDATE users SET password = '$password' WHERE email = '".$_SESSION['email']."'";
				if($conn->query($sql)){
					$_SESSION['success'] = "Password updated successfully";
					//unset our session since no error occured
					unset($_SESSION['old']);
					unset($_SESSION['new']);
					unset($_SESSION['retype']);
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
			}
			else{
				$_SESSION['error'] = "New and retype password did not match";
			}
		}
		else{
			$_SESSION['error'] = "Incorrect Old Password";
		}
	}
	else{
		$_SESSION['error'] = "Input needed data to update first";
	}

	header('location: showpassword.php');
	
?>