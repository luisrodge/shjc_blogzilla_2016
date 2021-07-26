<?php  

$comments_sql = "SELECT * FROM comments WHERE user_id = '$user_id' ORDER BY published DESC";
$comments_qry = mysqli_query($conn, $comments_sql);
$count = mysqli_num_rows($comments_qry);

$comments = "
<div class='comments dash'>
";

while($comment = mysqli_fetch_assoc($comments_qry))
{
	$id = $comment['id'];
	$username = $comment['full_name'];
	$body = $comment['body'];
	$published = $comment['published'];
	$comments .= "<span>";
	$comments .= "<p>{$username}</p>";
	$comments .= "<p class='comments-date'>posted on: {$published}</p>";
	$comments .= "<p>{$body}</p>";
	$comments .= "<a href=\"comments/delete.php?id={$id}\" class='delete'>delete</a>";
	$comments .= "</span>";
}

$comments .= "</div>";

?>