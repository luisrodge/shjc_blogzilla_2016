<?php  

$comment_form = <<<EOD

<div class='comment'>
	<form method='post' action="comments/create.php?id={$id}">
	 	<p>Enter your full name: <input type='text' name='name'></p>   
	 	<p>Comment: <br><textarea cols='60' rows='9' name = 'body'></textarea></p>
	 	<p><button type='submit' name='submit'>Add comment</button></p>
	</form>
</div>

EOD;
?>
