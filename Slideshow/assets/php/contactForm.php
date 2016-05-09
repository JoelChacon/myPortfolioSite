<?php

	// // Contact
	// $to = 'taktic11@gmail.com';
 //    $subject = 'Subject here...';

	// if(isset($_POST['c_name']) && isset($_POST['c_email']) && isset($_POST['c_message'])){
 //   		$name    = $_POST['c_name'];
 //    	$from    = $_POST['c_email'];
 //    	$message = $_POST['c_message'];

	// 	if (mail($to, $subject, $message, $from)) { 
	// 		$result = array(
	// 			'message' => 'Thanks for contacting me!',
	// 			'sendstatus' => 1
	// 			);
	// 		echo json_encode($result);
	// 	} else { 
	// 		$result = array(
	// 			'message' => 'Sorry, something is wrong',
	// 			'sendstatus' => 1
	// 			);
	// 		echo json_encode($result);
	// 	} 
	// }

?>
<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'taktic11@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>