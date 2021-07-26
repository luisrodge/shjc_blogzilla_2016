<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>

<div id="wrapper">
	
	<div id="header">
		<div id="brand"><a href="index.php"><img src="assets/logo.svg" alt="logo"></a></div>
		<?php  
			include 'partials/_nav.php';
			echo generateMenu();
		?>
	</div>

	<?php
	 if($banner && !isset($_SESSION['user'])) {
	 	include 'partials/_banner.php'; 
	 }
	 ?>

	<!-- Main section of the website -->
	<div id="content">
		<?php echo $content; ?>
	</div>
	<!--End of the main section -->

	<footer>
		<p>&copy; A product of LAR</p>
	</footer>

</div>

</body>
</html>