<?php  

require_once 'functions/config.php';

?>
<div id="banner">
	<h1>Blog posts from users all over the world and even other galaxies :)</h1>
	<span class="message">
		<?php  
		if(isset($_SESSION['message'])):
		?>
				<h4><?php echo $_SESSION['message']; ?></h4>
		<?php endif ?>
	</span>
	<form method="post" action="users/login.php" id="form_login">
		<label>Username:</label><input type="text" name="username"></input>
		<label>Password:</label><input type="password" name="password"></input>
		<button type="submit" name="login" class="hvr-wobble-horizontal">Login</button>
	</form>
</div>