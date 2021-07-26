<?php  

$comments_sql = "SELECT * FROM comments WHERE post_id = '$id' ORDER BY published DESC";
$comments_qry = mysqli_query($conn, $comments_sql);
$count = mysqli_num_rows($comments_qry);

$comments .= "
<div class='comments'>
<h3>Comments ({$count})</h3>

";

while($comment = mysqli_fetch_assoc($comments_qry))
{
	$username = $comment['full_name'];
	$body = $comment['body'];
	$published = $comment['published'];
	$comments .= "<span class='body'>";
	$comments .= "<p>{$username}</p>";
	$comments .= "<p>{$body}</p>";
	$comments .= "<p class='comments-date'>posted on: {$published}</p>";
	$comments .= "</span>";
}

$comments .= "</div>";

?>