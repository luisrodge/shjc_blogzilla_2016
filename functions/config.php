<?php  

require_once 'connect.php';
require_once 'time.php';

if (session_status() == PHP_SESSION_NONE) {
   	session_start();
}