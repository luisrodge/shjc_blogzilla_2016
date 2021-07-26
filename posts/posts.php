<?php  

require_once 'functions/config.php';

$posts_sql = "SELECT * FROM posts";
$posts_qry = mysqli_query($conn, $posts_sql);

?>

<ul>
	<?php while($row = mysqli_fetch_assoc($posts_qry)){ ?>
		<li>
			<h2><?php echo $row['title']; ?></h2>
		</li>
	<?php } ?>
</ul>