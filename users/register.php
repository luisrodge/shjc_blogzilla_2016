<?php 

require_once '../functions/config.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($first_name != '' && $last_name != '' && $username != '' && $password != '' && $confirm_password != '' && $email != '')
{
	if($password == $confirm_password)
	{
		$password = hash('sha512', $password);
		$email_code = md5($username + microtime());
		$sql = "INSERT INTO users (first_name, last_name, email, username, password, registered, email_code) VALUES ('$first_name', '$last_name',
				'$email', '$username', '$password', NOW(), '$email_code')";
		if(mysqli_query($conn, $sql))
		{
			$to = $email;
			$subject = 'Activate your account';
			$headers = 'From: admin@blogzilla.com';
			$body = "Click the following link to activate your account: http://blogzilla.jtekglobalsolutions.com/activate.php?email=$email&code=$email_code";

			mail($to, $subject, $body, $headers);

   			$_SESSION['message'] = 'You are now registered. Please activate your account to continue.';

			header("Location: ../index.php");
		}
	}
}
