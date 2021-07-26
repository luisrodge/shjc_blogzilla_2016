<?php 

require_once 'functions/config.php';

if(isset($_POST['submit']))
{
	if($_POST['title'] != '' && $_POST['body'] != '')
	{
		$user_id = $_SESSION['user'];
		$title = $_POST['title'];
		$body = $_POST['body'];
		if(mysqli_query($conn, "INSERT INTO posts (title, body, published, user_id) VALUES ('$title', '$body', NOW(), '$user_id')"))
		{
			$_SESSION['message'] = 'Blog entry succeffully created.';
			header("Location: dashboard.php");
		}
	}
}

$title = "Create a new blog entry";

$banner = false;

$content = <<<EOD

<h2>Publish a new blog entry</h2>

<form method="post" action="create.php">

<p>Title: <input type="text" name="title"><p>
<p>Body: <br><textarea name="body" cols="100" rows="20"></textarea><p>
<p><button type="submit" name="submit" class="publish">Publish</button<p>
</form>

EOD;

require_once 'app.php';
