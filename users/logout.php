<?php  
require_once '../functions/config.php';

session_unset();

session_destroy(); 

header("Location: ../index.php");