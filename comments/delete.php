<?php  

if(!isset($_GET['id'])) header("Location: ../index.php");

require_once '../functions/config.php';

$id = $_GET['id'];

if(mysqli_query($conn, "DELETE FROM comments WHERE id='$id'"))
{
	header("Location: ../dashboard.php");
}