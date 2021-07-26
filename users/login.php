<?php  

require_once '../functions/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

if($username != '' && $password != '')
{
	$password = hash('sha512', $password);
	$sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password' AND active=1"; 
	$user_qry = mysqli_query($conn, $sql);

	if(mysqli_num_rows($user_qry) == 1)
	{
		if(isset($_SESSION['message'])) unset($_SESSION['message']);
		$user = mysqli_fetch_assoc($user_qry);
		$_SESSION['user'] = $user['id'];
		header("Location: ../dashboard.php");
	}
	else
	{
		$_SESSION['message'] = 'Oops, something went wrong. Make sure your credentials are correct. Also make sure you have activated your account.';
		header("Location: ../index.php");
	}

}
else
{
	$_SESSION['message'] = 'Please ensure you entire your username and password.';
	header("Location: ../index.php");
}