<?php  

require_once 'functions/config.php';

$GLOBALS['page'] = 'home';

$title = "Welcome to Blogzilla";

$banner = true;

$content = '';

$posts_sql = "SELECT posts.id, posts.title, posts.body, posts.published, users.username FROM posts 
	INNER JOIN users 
	ON posts.user_id = users.id
	ORDER BY posts.published DESC";
$posts_qry = mysqli_query($conn, $posts_sql);

$content = "<ul id='latest'>\n";
	while($posts = mysqli_fetch_assoc($posts_qry))
	{
		$post_id = $posts['id'];
		$blog_title = $posts['title'];
		$body = substr($posts['body'],0,200);
		$time = strtotime($posts['published']);
		$published = date("m/d/y g:i A", $time);
		$username = $posts['username'];
		$content .= "<li class='preview'>";
		$content .= "<h2>{$blog_title}</h2>";
		$content .= "<p class='username'>by {$username} - {$published}</p>";
		$content .= "<p>{$body}...<p>";
		$content .= "<a href='read.php?id={$post_id}' class='read-more'>read more</a>";
		$content .= "</li>";
	}
$content .= "</ul>";


require_once 'app.php';


if(isset($_SESSION['message']))
{
	unset($_SESSION['message']);
}



