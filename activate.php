<?php  

require_once 'functions/connect.php';

$content = '';

if(isset($_GET['email']) && isset($_GET['code'])){
	$email = trim($_GET['email']);
	$code = trim($_GET['code']);
	$sql= "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		$user = mysqli_fetch_assoc($result);
		if($code == $user['email_code']){
			if(mysqli_query($conn, "UPDATE users SET active=1 WHERE email='$email' AND email_code='$code'")){
				$content = "
					<h2>Your account is now activated :)</h2>
					<h2>Login to blogzilla to start publishing new posts.</h2>
					<a href=http://blogzilla.jtekglobalsolutions.com/index.php>Login</a>
				";
			}
		}else{
			$content = "
				<h2>Oops, looks like something went wrong :)</h2>
				<h2>Account could not be activated</h2>
			";
		}
	}else{
		$content = "
				<h2>Oops, looks like something went wrong :)</h2>
				<h2>LAccount could not be activated</h2>
			";
	}	
}else{
	header("Location: http://blogzilla.jtekglobalsolutions.com/index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Activated</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
	
	<div id="activated">
		<?php  echo $content; ?>
	</div>
	
</body>
</html>