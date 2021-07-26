<?php 

if(!isset($_GET['id'])) header("Location: index.php");

require_once 'functions/config.php';


$title = "Mission Control";

$banner = false;

$comments = "";

$id = $_GET['id'];

require_once 'partials/_comment.php';
require_once 'comments/comments.php';

$post_sql = "SELECT * FROM posts WHERE id = '$id'";
$post_qry = mysqli_query($conn, $post_sql);
$post = mysqli_fetch_assoc($post_qry);

$content = <<<EOD
<div class='creds'>
Luis Rodriguez<br>
12/9/2019
<h2 class='read-title'>{$post['title']}</h2>

</div>
<div class='read'>
	<div class='read-post hvr-bounce-to-bottom hvr-bubble-float-left'>
		<p>{$post['body']}</p>
	</div>
</div>

<h2>Posts from other users</h2>


<div class='recommended'>
	<div class='cols'>
		<h3>one</h3>
	</div>
	<div class='cols'>
		<h3>one</h3>
	</div>
	<div class='cols'>
		<h3>one</h3>
	</div>

</div>

{$comment_form}

{$comments}


EOD;

require_once 'partials/_comment.php';



require_once 'app.php';

 ?>