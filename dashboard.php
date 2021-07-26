<?php 

require_once 'functions/config.php';
require_once 'partials/_map.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}

$user_id = $_SESSION['user'];

$title = "Mission Control";

$banner = false;

$msg = '';

if(isset($_SESSION['message']))
{
	$msg =  $_SESSION['message'];
}

$users_sql = "SELECT * FROM users";
$users_qry = mysqli_query($conn, $users_sql);
$user_count = mysqli_num_rows($users_qry);

$posts_sql = "SELECT * FROM posts";
$posts_qry = mysqli_query($conn, $posts_sql);
$post_count = mysqli_num_rows($posts_qry);

require_once 'comments/_comments.php';

$content = <<<EOD

{$map}

<div class="stats">
	<div class="col hvr-push">
		<h2>Total blog posts: {$post_count}</h2>
	</div>
	<div class="col hvr-push">
		<h2>Total users: {$user_count}</h2>
	</div>
</div>
<div class="message">
	{$msg}
</div>
<div class="row">
	<div class="col hvr-shrink ">
		<h2><a href="create.php">New post</a></h2>
	</div>
	<div class="col middle hvr-shrink ">
		<h2><a href="posts.php">Edit existing blog post</a></h2>
	</div>
	<div class="col hvr-shrink ">
		<h2><a href="#">Change profile settings</a></h2>
	</div>
</div>

<div class="info">
	<div class = "col hvr-sink">
		<h2>Latest comments on your posts</h2>
		{$comments}
	</div>
	<div class = "col hvr-sink">
		<h2>Newest users</h2>
		<ol>
EOD;


$users_sql = "SELECT * FROM users ORDER BY registered DESC LIMIT 10";
$users_result = mysqli_query($conn, $users_sql);

		while($row = mysqli_fetch_assoc($users_result))
		{
			$username = $row['username'];
			$content .= "<li>{$username}</li>";
		}
		$content .= "</ol>";
	$content .= "</div>";
$content .= "</div>";


require_once 'app.php';


if(isset($_SESSION['message']))
{
	unset($_SESSION['message']);
}



