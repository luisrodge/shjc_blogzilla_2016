<?php  

if(!isset($_GET['id'])) {
	header("Location: ../index.php");
}

require_once '../functions/config.php';

if($_POST['name'] != '' && $_POST['body'] != '')
{
	$post_id = $_GET['id'];
	$username = $_POST['name'];
	$body = $_POST['body'];

	$user_sql = "SELECT * FROM posts WHERE id = '$post_id'";

	$user = mysqli_fetch_assoc(mysqli_query($conn, $user_sql));
	$user_id = $user['user_id'];

	//echo $user_id;

	if(mysqli_query($conn, "INSERT INTO comments (full_name, body, post_id, published, user_id) VALUES ('$username', '$body', '$post_id', NOW(), '$user_id' )"))
	{
		header("Location: ../read.php?id={$post_id}");
	}
}