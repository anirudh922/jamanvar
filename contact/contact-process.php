<?php

define("WEBMASTER_EMAIL",'jamanvarcatering.com');
//$address = "example@themeforest.net";
$address = "jamanvarcatering.com";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array( 'name','surname', 'email', 'subject', 'phone', 'place', 'date','guest');

foreach ( $fields as $field ) {
	if ( empty($_POST[$field]) || trim($_POST[$field]) == '' )
		$error = true;
}

if ( !$error ) {

	$name = stripslashes($_POST['name']);
	$surname = stripslashes($_POST['surname']);
	$email = trim($_POST['email']);
	$subject = stripslashes($_POST['subject']);		
	$phone = stripslashes($_POST['phone']);
	$place = stripslashes($_POST['place']);
	$date = stripslashes($_POST['date']);
	$guest = stripslashes($_POST['guest']);
	
	$e_subject = 'You\'ve been contacted by ' . $name . '.';

	// Configuration option.
	// You can change this if you feel that you need to.
	// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

	$e_body = "You have been contacted by: $name" . PHP_EOL . PHP_EOL;
	$e_body2 = "surname $surname" . PHP_EOL . PHP_EOL;
	$e_reply = "E-mail: $email" . PHP_EOL . PHP_EOL;
	$e_subject = "\r\nsubject: $subject";	
	$e_content = "Message:\r\n$subject" . PHP_EOL . PHP_EOL;
	$e_phone = "phone:\r\n$phone" . PHP_EOL . PHP_EOL;
	$e_place = "place:\r\n$place" . PHP_EOL . PHP_EOL;
	$e_date = "date:\r\n$date" . PHP_EOL . PHP_EOL;
	$e_guest = "date:\r\n$guest" . PHP_EOL . PHP_EOL;

	$msg = wordwrap( $e_body .$e_body2 .$e_reply .$e_subject .$e_content .$e_phone,$e_date,$e_place, 70 );

	$headers = "From: $email" . PHP_EOL;
	$headers .= "Reply-To: $email" . PHP_EOL;
	$headers .= "MIME-Version: 1.0" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	if(mail($address, $e_subject, $msg, $headers)) {

		// Email has sent successfully, echo a success page.

		echo 'Success';

	} else {

		echo 'ERROR!';

	}

}

?>