<?php
	// $name = $_POST["name"];
	// $visitor_email = $_POST["email"];
	// $message = $_POST["message"];

	// $email_from = "agzamovich88@gmail.com";

	// $email_subject = "New Form Submitted from Know Your Cars";

	// $email_body = "User Name: $name.\n".
	// 					"User Email: $visitor_email.\n".
	// 						"User Message: $message.\n";

	// $to = "miralimov@gmail.com";
	// $headers = "From: $email_from \r\n";
	// $headers .= "Reply-To: $visitor_email \r\n"; 

	// mail($to, $email_subject, $email_body, $headers);

	// header("Location: index.html");
$result="";

if(isset($_POST["submit"])){
	require_once("phpmailer/PHPMailerAutoload.php");
	$mail = new PHPMailer();

	$mail->Host="smtp.gmail.com";
	$mail->Port=465;
	$mail->isSMTP();
	$mail->SMTPAuth=true;
	$mail->SMTPSecure="ssl";
	$mail->Username="agzamovich88@gmail.com";
	$mail->Password="d0198099585";
	$mail->setFrom($_POST["email"], $_POST["name"]);
	$mail->addAddress("mpcs7777@gmail.com");
	$mail->addReplyTo($_POST["email"],$_POST["name"]);
	$mail->isHTML(true);
	$mail->subject="Form Submission: ".$_POST["subject"];
	$mail->Body="<h1 align=center>Name : ".$_POST["name"]."<br>Email: ".$_POST["email"]."<br>Message: ".$_POST["msg"]."</h1>";

	if(!$mail->send()){
		$result="Something went wrong, Please try again!";
	}
	else{
		$result="Thank you, message received!";
	}

}
header("Location: index.html");

?>