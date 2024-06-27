
<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["vname"]==""||$_POST["vemail"]==""){
echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['vemail'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
// $subject = $_POST['sub'];
// $message = 'THANK YOU FOR CONTACT US OUR TEAM WILL CONATCT YOU SOON';
$message = "
THANK YOU FOR CONTACT US OUR TEAM WILL CONATCT YOU SOON TO YOUR ".$email." EMAIL-ID";
 $subject = "FROM CARSERV";
// $message = $_POST['msg'];
 
$headers = 'From:' . $email . "rn"; // Sender's Email
// $headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it ||$_POST["sub"]==""||$_POST["msg"]==""
// $message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail($email, $subject, $message, $headers);
echo "Your issue has been sent successfuly ! Thank you for contacting us";
}
}
}
?>
